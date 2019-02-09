<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdresseIdUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //Ajout de l'attridut souhaité dans la table produits;
            //UnsignedInteger indique qu'il s'agira d'un entier pour l'id.
            //La clé est déclaré de façon obligatoir, il n y a pas de façon ->nullable(); car je                veux qu'un produit soit forcement dans une catégorie.

            //adresse_id référencera l'identifint de la clé primaire sur la table adresses
            //->nulable(); permet que lorsque je créer un compte utilisateur la clé étrangère                   valeur id aura une valeur null au moment de la création d'un user et l'association                se fera après la créationde l'adresse
            $table->unsignedInteger('adresse_id')->nullable();

            //Description de la clé étrangère vres le lien.
            //La valeur (adresse_id) sera égale à la valeur (id) mais dans (adresses)
            $table->foreign('adresse_id')->references('id')
                ->on('adresses')

                //Que doit faire la base de données en cas de supprésion ? avec ->onDelete('set                     null')
                //Lorsque je supprime une adresse je ne veux pas forcement supprimer l'utilisateur
                ->onDelete('set null');

            //Activation des contraintes de clés étrangères.
            //Active la vérification au niveau de la base de données ex: on ne peut pas lier un                 produit
            // à une catégorie qui n'existe pas, j'aurai une error sql.
            Schema::enableForeignKeyConstraints();
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //annuler une migration

            //Avant de désactiver la clé étrangère je désactiverai les contraintes
            //ce qui va me permètre de ne pas avoir d'error sql.
            Schema::disableForeignKeyConstraints();

            //DropForeign : supprime la clé étrangère
            //Le nom de l'attribut à supprimé (['adresse_id']);
            $table->dropForeign(['adresse_id']);

            //permet de supprimer une collone
            $table->dropColumn('adresse_id');
        });
    }
}
