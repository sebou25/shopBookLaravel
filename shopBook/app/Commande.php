<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //lien entre adresse et commande
    public function adresse(){
        //permet de recupérer l'adresse dans une commande
        return $this->belongsTo('App\Adresse');
    }
    //lien entre commandes et produits
    public function produits(){
        //Recupère les produits associé à la commande et en plus ->les attributs withPivot() selectionnés
        return $this->belongsToMany('App\Produit','commade_produits')->withPivot(
            ['qte','prix_unitaire_ttc', 'prix_unitaire_ht','prix_total_ttc','prix_total_ht','nom_du_produit']
        );
    }

}
