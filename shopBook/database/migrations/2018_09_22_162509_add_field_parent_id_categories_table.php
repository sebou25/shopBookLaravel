<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldParentIdCategoriesTable extends Migration
{

    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            //parent_id, sera pour stocker l'identifiant de la category parent
            $table->unsignedInteger('parent_id')->nullable();
            //la clé étrangère est située dans la même table de la clé primaire (association self referenced)
            //je fais un onDelete('set null') si on supprime le parent_id on garde la catégorie
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('set null');

            Schema::enableForeignKeyConstraints();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
}
