<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommadeProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commade_produits', function (Blueprint $table) {
           //attention pas d'auto incrémentation car clé primaire
            $table->timestamps();
            //1er attribut

            $table->unsignedInteger('commande_id');
            //(clé étrangère) commande_id référencera la table commandes
            $table->foreign('commande_id')->references('id')
                ->on('commandes')
                ->onDelete('cascade');
            //2ème attribut
            $table->unsignedInteger('produit_id');
            //(clé étrangère) produit_id référencera la table produits
            $table->foreign('produit_id')->references('id')
                ->on('produits')
                ->onDelete('cascade');

            //déclaration de la clé primaire (cette méthode va prendre un tableau qui contiendra l'association des deux clés commande-id / produit_id)
            $table->primary(['commande_id','produit_id']);

            //création d'attribut supplémentaire sur la table CommandeProduit tel que qté
            $table->integer('qte');
            $table->float('prix_unitaire_ttc');
            $table->float('prix_unitaire_ht');
            $table->float('prix_total_ttc');
            $table->float('prix_total_ht');
            $table->float('tva');
            $table->string('nom_du_produit');

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
        Schema::dropIfExists('commade_produits');
    }
}
