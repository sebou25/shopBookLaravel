<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
//        //attention a bien utiliser l'autocomplétion
//        $category = new \App\Category();
//        //création de champs du nav
//        $category->nom = "Auteur";
////        mettre is_online à vrai (&) pour qu'elle soit visible
//        $category->is_online = 1;
//        $category->save();
//
//        $category2 = new \App\Category();
//        //création de champs du nav
//        $category2->nom = "Concept";
////        mettre is_online à vrai (&) pour qu'elle soit visible
//        $category2->is_online = 1;
//        $category2->save();
//
//        $category3 = new \App\Category();
//        //création de champs du nav
//        $category3->nom = "Etude Auteur";
//       je mets is_online à vrai (&) pour qu'elle soit visible
        $category3->is_online = 1;
//        $category3->save();
//
//        $category4 = new \App\Category();
//        //création de champs du nav
//        $category4->nom = "Literature";
////        mettre is_online à vrai (&) pour qu'elle soit visible
//        $category4->is_online = 1;
//        $category4->save();
//
//        $category5 = new \App\Category();
//        //création de champs du nav
//        $category5->nom = "Comics";
////        mettre is_online à vrai (&) pour qu'elle soit visible
//        $category5->is_online = 1;
//        $category5->save();

        $category6 = new \App\Category();
        //création de champs du nav
        $category6->nom = "Spinoza";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category6->is_online = 1;
//        nunéro de l'id de la catégory
        $category6->parent_id =1;
        $category6->save();

        $category7 = new \App\Category();
        //création de champs du nav
        $category7->nom = "Nietzsche";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category7->is_online = 1;
//        nunéro de l'id de la catégory
        $category7->parent_id =1;
        $category7->save();

        $category8 = new \App\Category();
        //création de champs du nav
        $category8->nom = "Désir";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category8->is_online = 1;
//        nunéro de l'id de la catégory
        $category8->parent_id =2;
        $category8->save();

        $category9 = new \App\Category();
        //création de champs du nav
        $category9->nom = "Le mal";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category9->is_online = 1;
//        nunéro de l'id de la catégory
        $category9->parent_id =2;
        $category9->save();

        $category10 = new \App\Category();
        //création de champs du nav
        $category10->nom = "L'amour";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category10->is_online = 1;
//        nunéro de l'id de la catégory
        $category10->parent_id =2;
        $category10->save();

        $category11 = new \App\Category();
        //création de champs du nav
        $category11->nom = "Deleuze pas à pas";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category11->is_online = 1;
//        nunéro de l'id de la catégory
        $category11->parent_id =3;
        $category11->save();

        $category12 = new \App\Category();
        //création de champs du nav
        $category12->nom = "Nietzsche pas à pas";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category12->is_online = 1;
//        nunéro de l'id de la catégory
        $category12->parent_id =3;
        $category12->save();

        $category13 = new \App\Category();
        //création de champs du nav
        $category13->nom = "Spinoza citation";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category13->is_online = 1;
//        nunéro de l'id de la catégory
        $category13->parent_id =3;
        $category13->save();

        $category14 = new \App\Category();
        //création de champs du nav
        $category14->nom = "Don Quichotte";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category14->is_online = 1;
//        nunéro de l'id de la catégory
        $category14->parent_id =4;
        $category14->save();

        $category15 = new \App\Category();
        //création de champs du nav
        $category15->nom = "Dom Juan";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category15->is_online = 1;
//        nunéro de l'id de la catégory
        $category15->parent_id =4;
        $category15->save();

        $category16 = new \App\Category();
        //création de champs du nav
        $category16->nom = "Les diaboliques";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category16->is_online = 1;
//        nunéro de l'id de la catégory
        $category16->parent_id =4;
        $category16->save();

        $category17 = new \App\Category();
        //création de champs du nav
        $category17->nom = "Walkig dead T1";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category17->is_online = 1;
//        nunéro de l'id de la catégory
        $category17->parent_id =5;
        $category17->save();

        $category18 = new \App\Category();
        //création de champs du nav
        $category18->nom = "Walkig dead T2";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category18->is_online = 1;
//        nunéro de l'id de la catégory
        $category18->parent_id =5;
        $category18->save();

        $category19 = new \App\Category();
        //création de champs du nav
        $category19->nom = "Walkig dead T3";
//        mettre is_online à vrai (&) pour qu'elle soit visible
        $category19->is_online = 1;
//        nunéro de l'id de la catégory
        $category19->parent_id =5;
        $category19->save();
   }
}
