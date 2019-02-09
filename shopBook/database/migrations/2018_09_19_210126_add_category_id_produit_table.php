<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdProduitTable extends Migration
{
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            //Ajout de l'attridut souhaité dans la table produits;
            //UnsignedInteger indique qu'il s'agira d'un entier pour l'id.
            //La clé est déclaré de façon obligatoir, il n y a pas de façon ->nullable();
            // car je veux qu'un produit soit forcement dans une catégorie.

             $table->unsignedInteger('category_id');

            //Description de la clé étrangère vres le lien.
            //La valeur (category_id) sera égale à la valeur (id) mais dans (categories)


            $table->foreign('category_id')->references('id')
                                                  ->on('categories')
             //Que doit faire la base de données en cas de supprésion ? avec ->onDelete('cascade')
             //Lorsque je supprime une catégorie alors tous les produits de cette catégorie serait supprimé ('cascade')
             //Cela respect la logique que un rpoduit doit être forcement dans une catégorie.
                                                  ->onDelete('cascade');
            //Activation des contraintes de clés étrangères.
            //Active la vérification au niveau de la base de données ex: on ne peut pas lier un produit
            // à une catégorie qui n'existe pas, j'aurai une error sql.
            Schema::enableForeignKeyConstraints();

        });
    }

    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {

            //annuler une migration

            //Avant de désactiver la clé étrangère je désactiverai les contraintes
            //ce qui va me permètre de ne pas avoir d'error sql.
            Schema::disableForeignKeyConstraints();
            //DropForeign : supprime la clé étrangère
            //Le nom de l'attribut à supprimé (['category_id']);
            $table->dropForeign(['category_id']);
            //permet de supprimer une collone
            $table->dropColumn('category_id');
        });
    }
}
