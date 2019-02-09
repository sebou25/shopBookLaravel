<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUserIdCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            //
            $table->unsignedInteger('user_id');
            //la clé étrangère est située dans la même table de la clé primaire (association self referenced)
            //je fais un cascade, si on supprime l'user on supprime la commande pour ne pas avoir de commande seul
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
