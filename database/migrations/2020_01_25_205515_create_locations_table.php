<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> bigInteger('profile_id')->unsigned();
            $table ->string('country');
            //ciudad, codigo postal, direccion...
            $table->timestamps();

            $table ->foreign('profile_id')->references('id')
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
        Schema::dropIfExists('locations');
    }
}
