<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFielAdresseTableCommandes extends Migration
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
            $table->unsignedInteger('adresse_id')->nullable();
            //la clé étrangère est située dans la même table de la clé primaire (association self referenced)
            //je fais un onDelete('set null') si on supprime l'adresse on garde la commande
            $table->foreign('adresse_id')->references('id')->on('adresses')->onDelete('set null');
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
            $table->dropForeign(['adresse_id']);
            $table->dropColumn('adresse_id');
        });
    }
}
