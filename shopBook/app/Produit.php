<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Produit extends Model
{

    //variable static qui va contenir le taux de tva
    private static $facteur_tva = 1.055;

    //one to many
    //methode qui va pointer vers le model Category
    //je donne le nom vers lequel la methode pointe
    public function category(){

        return $this->belongsTo('App\Category');
    }
    //création de l'association
    //méthode qui pointe vers tag
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }



    public function recommandations (){
        return $this->belongsToMany('App\Produit', 'produit_recommande', 'produit_id', 'produit_recommande_id');
    }
    //Afficher le prix ttc
    public function prixTTC(){
    $prix_ttc = $this->prix_ht * self::$facteur_tva;
    return number_format($prix_ttc, 2);
    }





}
