<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTagTable extends Migration
{
    public function up()
    {
        Schema::create('produit_tag', function (Blueprint $table) {

            //1er attribut
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')
                ->on('tags')
                //je fais un cascade, si on supprime le tag on supprime le produit pour ne pas
                //avoir de produit seul
                ->onDelete('cascade');

            //2ème attribut
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')->references('id')
                ->on('produits')
                //je fais un cascade, si on supprime le produit on supprime le tag pour ne pas
                //avoir de tag seul
                ->onDelete('cascade');

            //déclaration de la clé primaire (cette méthode va prendre un tableau qui contiendra
            //les deux clés tag_id / produit_id)
            $table->primary(['tag_id','produit_id']);

            Schema::enableForeignKeyConstraints();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produit_tag');
    }
}
