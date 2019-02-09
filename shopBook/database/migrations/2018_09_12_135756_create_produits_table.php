<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            //clé id auto-incrmenté
            $table->increments('id');
            //permets de stocker la date de création et de mise à jour d'un produit
            $table->timestamps();
            // indique qu'il s'agit d'un string (chaine de charatère d'une longueur de 100max
            $table->string("titre",100);
            $table->string("hauteur",100);
            $table->string("editeur",100);
            $table->string("collection",100);
            // indique qu'il s'agit d'un text plus long qu'un string
            $table->text('description');
            //les base de donnée ne stock pas les photos mais le chemin
            $table->string("photo");
            //indique qu'il s'agit d'un float (nuombre avec des décimales)
            $table->float("prix_ht",8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
