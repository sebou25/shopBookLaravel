<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //création de l'association
    //la méthode tag pointe sur notre modèle produits
    public function produits(){
        return $this->belongsToMany('App\Produit');
    }
}
