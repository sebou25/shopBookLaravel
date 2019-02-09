<?php

use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    public function run()
    {
        //création mon premier produit, pour ça je vais chercher le model Produit que je viens           de créer
        $produit= new \App\Produit();
        //je définis des valeurs pour ses attributs
        $produit->titre = "Spinoza Connaître en citations";
        $produit->hauteur = "Delassus Eric";
        $produit->editeur = "Ellipses";
        $produit->collection = "Connaître en citation";
        $produit->description = "L’homme n’est pas « dans la nature comme un empire dans un    empire » écrit Spinoza dans la préface de la troisième partie de son livre majeur L’Éthique. 
";      //Les basess de données ne stockent pas les photos mais le chemin
        $produit->photo = "spinoza_citation.jpg";
        $produit->prix_ht = "11.90";
        $produit->category_id = 3 ;
        $produit->save();


        $produit= new \App\Produit();
        $produit->titre = "Traité théologico-politique";
        $produit->hauteur = "Spinoza";
        $produit->editeur = "Manzini Frédéric";
        $produit->collection = "Focus sur ...";
        $produit->description = "Jamais personne ne renoncera à son exigence de liberté, car elle est légitime et naturelle. Voici ce que Spinoza entend rappeler au pouvoir politique qui pourrait être tenté de l’oublier, que ce soit par volonté de tout contrôler ou parce qu’il est soumis à des pressions extérieures.";
        $produit->photo = "spinoza_ttp.jpg";
        $produit->prix_ht = "5.60";
        $produit->category_id = 1 ;
        $produit->save();



        $produit= new \App\Produit();
        $produit->titre = "Deleuze pas à pas ";
        $produit->hauteur = "Jacques Vincent";
        $produit->editeur = "Ellipses";
        $produit->collection = "Pas à pas";
        $produit->description = "Si Deleuze suscite la curiosité, voire l’enthousiasme, plus d’un lecteur se trouve désarmé devant la complexité de sa philosophie. Pour appréhender l’oeuvre, cet ouvrage propose deux parcours pas à pas.";
        $produit->photo = "deleuze_pas_a_pas.jpg";
        $produit->prix_ht = "17.40";
        $produit->category_id = 3 ;
        $produit->save();



        $produit= new \App\Produit();
        $produit->titre = "Ethique. Bilingue Latin-Français";
        $produit->hauteur = "Baruch Spinoza";
        $produit->editeur = "Points";
        $produit->collection = "Oeuvre";
        $produit->description = " Le livre que tu tiens prétend faire ton bonheur, par la seule vertu de la mathématique : à toi de voir, lecteur, si peu ou prou il y parvient.
Tu trouveras dans ce volume le texte original de l' Éthique, tel qu'il fut établi par Carl Gebhardt en 1925, la traduction que j'en proposai en 1988, mais longuement revue et amendée, ainsi qu'un dossier qui te dira ce qu'on pense avoir été la vie, et la mort, du sage Spinoza. 
Bernard Pautrat";
        $produit->photo = "spinoza_ethic.jpg";
        $produit->prix_ht = "11.90";
        $produit->category_id = 1 ;
        $produit->save();


        $produit= new \App\Produit();
        $produit->titre = "Nietzsche pas à pas";
        $produit->hauteur = "Steffens Martin";
        $produit->editeur = "Ellipses";
        $produit->collection = "Pas à pas";
        $produit->description = "En guise d’invitation à son lecteur, Nietzsche avait composé ce petit poème :
“Ils te séduisent mon style et mon langage ?
Quoi, tu me suivrais pas à pas ?
Aie souci de n’être fidèle qu’à toi-même –
Et tu m’auras suivi – tout doux ! tout doux !”
Mais si Nietzsche exige de n’être fidèle qu’à soi-même, pourquoi donc prendre la peine de le lire ?
.jpg";  $produit->photo = "nietzsche_pas_a_pas.jpg";
        $produit->prix_ht = "17.40";
        $produit->category_id = 3 ;
        $produit->save();


        $produit= new \App\Produit();
        $produit->titre = "Ainsi Parlait Zarathoustra";
        $produit->hauteur = "Friedrich Nietzsche";
        $produit->editeur = "Points";
        $produit->collection = "Oeuvre";
        $produit->description = "Ainsi parlait Zarathoustra ou Ainsi parla Zarathoustra, sous-titré « Un livre pour tous et pour personne » est un poème philosophique de Friedrich Nietzsche, publié entre 1883 et 1885.";
        $produit->photo = "nietzsche_zara.jpg";
        $produit->prix_ht = "11";
        $produit->category_id = 1 ;
        $produit->save();


        $produit = new \App\Produit();
        $produit->titre = "Le désir";
        $produit->hauteur = "Cabestan Philippe";
        $produit->editeur = "Ellipses";
        $produit->collection = "Notions";
        $produit->description = "
A la frontière du cours – dont on ne saurait faire l'économie – et du recueil de sujets corrigés, Philo-notions voudrait apporter aux élèves des classes terminales une aide concrète.
";      $produit->photo = "desir.jpg";
        $produit->prix_ht = "5.70";
        $produit->category_id = 2 ;
        $produit->save();



        $produit= new \App\Produit();
        $produit->titre = "Le mal";
        $produit->hauteur = "Claire Crignon";
        $produit->editeur = "GF Corpus";
        $produit->collection = "Notions";
        $produit->description = "Face à l’existence du mal sous ses multiples formes – crimes, catastrophes naturelles, mal moral ou physique, mal commis ou subi –, nombre de philosophes et de théologiens ont tenté de trouver à ce dernier des justifications.
";      $produit->photo = "mal.jpg";
        $produit->prix_ht = "7.50";
        $produit->category_id = 2 ;
        $produit->save();



        $produit= new \App\Produit();
        $produit->titre = "L'amour";
        $produit->hauteur = "Éric Blondel";
        $produit->editeur = "GF Corpus";
        $produit->collection = "Notions";
        $produit->description = "Quoi de plus varié que les différentes nuances de l’amour? Amour-passion des amoureux, amour filial, amour platonique, amour hétéro- ou homosexuel, amour des belles choses, du vin ou du chant, amour du pouvoir, amour de Dieu.
";      $produit->photo = "lamour.jpg";
        $produit->prix_ht = "8.55";
        $produit->category_id = 2 ;
        $produit->save();


        $produit= new \App\Produit();
        $produit->titre = "Walking dead 1";
        $produit->hauteur = "Robert Kirkman";
        $produit->editeur = "Skyblound";
        $produit->collection = "Comics";
        $produit->description = "Une épidémie de proportions apocalyptiques a balayé le globe, provoquant la montée des morts et se nourrissant des vivants. En quelques mois, la société s'est effondrée; il n'y a pas de gouvernement, pas d'épicerie, pas de livraison du courrier, pas de télévision par câble.";
        $produit->photo = "walking1.jpg";
        $produit->prix_ht = "11.50";
        $produit->category_id = 5 ;
        $produit->save();

        $produit= new \App\Produit();
        $produit->titre = "Walking dead 2";
        $produit->hauteur = "Robert Kirkman";
        $produit->editeur = "Skyblound";
        $produit->collection = "Comics";
        $produit->description = "Une épidémie de proportions apocalyptiques a balayé le globe, provoquant la montée des morts et se nourrissant des vivants. En quelques mois, la société s'est effondrée; il n'y a pas de gouvernement, pas d'épicerie, pas de livraison du courrier, pas de télévision par câble.";
        $produit->photo = "Walking2.jpg";
        $produit->prix_ht = "11.50";
        $produit->category_id = 5 ;
        $produit->save();

        $produit= new \App\Produit();
        $produit->titre = "Walking dead 3";
        $produit->hauteur = "Robert Kirkman";
        $produit->editeur = "Skyblound";
        $produit->collection = "Comics";
        $produit->description = "Une épidémie de proportions apocalyptiques a balayé le globe, provoquant la montée des morts et se nourrissant des vivants. En quelques mois, la société s'est effondrée; il n'y a pas de gouvernement, pas d'épicerie, pas de livraison du courrier, pas de télévision par câble.";
        $produit->photo = "walking3.jpg";
        $produit->prix_ht = "11.50";
        $produit->category_id = 5 ;
        $produit->save();

        $produit= new \App\Produit();
        $produit->titre = "Dom Juan";
        $produit->hauteur = "Molière";
        $produit->editeur = "Pokete";
        $produit->collection = "Théatre";
        $produit->description = "Ce grand seigneur est le diable en personne. Il blasphème, méprise ses créanciers, étincelle d'esprit et de méchanceté. Il séduit mille femmes, pour les humilier après. À ses côtés, son valet, Sganarelle, est terrorisé par son insolence, son aisance, son cynisme.";
        $produit->photo = "dom.jpg";
        $produit->prix_ht = "4.50";
        $produit->category_id = 4 ;
        $produit->save();

        $produit= new \App\Produit();
        $produit->titre = "Don Quichote";
        $produit->hauteur = "Miguel Cervantes";
        $produit->editeur = "Points";
        $produit->collection = "Points";
        $produit->description = "Mythe du chevalier se battant contre les moulins à vent, dessin de Gustave Doré, de Picasso, de Dali, tel est le don Quichotte qui survit aujourd'hui dans nos mémoires. Pourtant, ce fou de littérature, ce dévoreur de romans de chevalerie, qui part à l'aventure pour voir si ce que disent les livres est vrai, est le héros du premier roman moderne.";
        $produit->photo = "don.jpg";
        $produit->prix_ht = "9.50";
        $produit->category_id = 4 ;
        $produit->save();

        $produit= new \App\Produit();
        $produit->titre = "Les diaboliques";
        $produit->hauteur = "Barbey d'Aurevilly";
        $produit->editeur = "Lgf";
        $produit->collection = "Classique";
        $produit->description = "Comme le Diable, qui était un ange aussi, mais qui a culbuté, - si elles sont des anges, c'est comme lui, - la tête en bas, le... reste en haut ! »";
        $produit->photo = "diaboliques.jpg";
        $produit->prix_ht = "9.50";
        $produit->category_id = 4 ;
        $produit->save();

    }
}
