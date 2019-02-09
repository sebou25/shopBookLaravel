<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Produit;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //methode qui affiche la page d'accueil
    public function index(){

        //SELECT * FROM produits
//        $produits = Produit::all();

        //optimisation requête (equivant à Produit::all();)
        $produits = Produit::with('category')->get();

        //porter de la variable $categories
        //$categories = Category::where('is_online',1)->get();


   //elle va returner une view du fichier home
        return view('shop.index', compact('produits', 'categories'));
    }

    //methode qui affiche la page d'un produit en particulier
    public function produit (Request $request){

        //porter de la variable $categories
        //$categories = Category::where('is_online',1)->get();

    //SELECT * FROM produit WHERE id = ?
    //dd($request->id);
        $produit = Produit::find($request->id);
        //dd($produit);


        return view ('shop.produit',compact('produit'));

    }

    //metode qui affiche la page categorie
    // méthode request afin de récupérer dans mon url un paramètre, qui sera l’identifiant de la catégorie
    public function viewByCategory(Request $request){
    //je vais faire un where avec un filtre sur is_online (rajout ->get(); pour executer la methode where()

      //$categories = Category::where('is_online',1)->get();

      //je test avec un dd() pour voir si cela fonctionne
      //dd($categories);

// je commante ma requête pour en faire une autre (plus bas)
        //$produits = Produit::where ('category_id',$request->id)->get();

//j'ai recupérer l'identifiant situé dans l'url
//permet d'afficher la (une seul avec find) catégorie en question dans le fil d'ariane
        $category = Category::find($request->id);

       // j'appel ma nouvelle méthode que je stoque dans la variable $produits, que je passe à la view
        $produits = $category->produits();


//retourne une vue qui est dans le dossier 'shop' et le fichier 'categorie'
        return view ('shop.categorie',compact('produits','category'));
    }

    //methode qui afiche les tags
    public function viewByTag(Request $request){
        //je récupère le tag dans ma base de données
        $tag = Tag::find($request->id);
        //je vais chercher les produits avec la methode produits (dans le model Tag.php)
        $produits = $tag->produits;
        //retourne une vue qui est dans le dossier 'shop' et le fichier 'categorie'
        return view ('shop.categorie',compact('produits','tag'));
    }
}
