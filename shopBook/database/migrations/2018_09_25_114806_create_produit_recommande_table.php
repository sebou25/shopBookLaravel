<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitRecommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_recommande', function (Blueprint $table) {
            //1er attribut
            $table->unsignedInteger('produit_recommande_id');
            $table->foreign('produit_recommande_id')->references('id')->on('produits')->onDelete('cascade');
            //2ème attribut
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');

            //déclaration de la clé primaire (cette méthode va prendre un tableau qui contiendra les deux clés produit_recommande_if , _id / produit_id)
            $table->primary(['produit_recommande_id','produit_id']);

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
        Schema::dropIfExists('produit_recommande');
    }
}
