<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *  Comment(FK y Tipo) -> Puede Pertenecer a -> Video(PK)
     *                                      ó  a -> Post(PK)
     *  Por lo tantoes ua Relacion POLIMORFICA
     *  no se puede colocar 2 FK_ID y dejar uno null o algo asi...
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('body');
            $table->morphs('comentable'); // singular + able
                    // morph guarda: Type: namespace/nombreDeClase y FK_ID
                    // de Video o Post
            $table->timestamps();

            $table ->foreign('user_id')->references('id')
                                       ->on('users')
                                       ->onDelete('cascade')
                                       ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
