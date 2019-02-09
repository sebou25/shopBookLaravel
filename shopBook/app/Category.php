<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    //Récupérer la catégorie parent d’une catégore.
    public function parent(){
   //une category parent appartient au model Category
  //je mets le chemin et en 2ème paramètres je mets la clé étrangère
    return $this->belongsTo('App\Category','parent_id');
    }

    public function childrens(){
        return $this->hasMany('App\Category','parent_id');
    }

    //Récucupérer les produits de la catégorie -> One To Many (dans une catégorie y aura plusieurs produits)->elle ponte vers le model Produit.
    public function produitsParent(){
        return $this->hasMany('App\Produit');
    }

    //Récupérer des produits situés dans une catégorie enfant au travers d'une catégorie parent
    public function produitsChild(){
        //je precise les clé étrangère (parent fait reference au categorie comme auteur)
        // et category_id fait refence à l'attribut de la clé étrangère
        return $this->hasManyThrough('App\Produit', 'App\Category', 'parent_id', 'category_id');
    }
    //permet la fusion des deux resultat (parent / enfant)
    public function produits(){
       // j'applique la methode ->get() pour avoir une fusion de deux collections
        //sur cette méthode get() je vais appeller une méthode laravel ->merge qui permet la fusion
        //et qui prend en paramètre une autre collection (produi_parent et produit_enfant)
        //$this->produitParent / $this->produitChild
        $poduits = $this->produitsParent()
            //optimisaion requête->with()
                //merge fusionne deux collections produit parent et produit enfant
            ->with('category')->get()->merge($this->produitsChild()->with('category')->get());
        return $poduits;
    }

}
