<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table -> bigInteger('level_id')
                     ->unsigned()
                     ->nullable()
                     ->after('id');

            $table ->foreign('level_id')->references('id')
                                       ->on('levels')
                                       ->onDelete('set null')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_level_id_foreign');
            // opcioneal $table->dropForeign(['level_id'])
        });
    }
}
