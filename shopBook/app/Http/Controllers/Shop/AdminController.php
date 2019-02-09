<?php

namespace App\Http\Controllers\Shop;


use Illuminate\Support\CollectionstdClass;
use App\Addproduit;
use App\Addtag;
use App\Adresse;
use App\Category;
use App\CommadeProduit;
use App\Commande;
use App\Produit;
use App\Tag;
use App\Updatatag;
use App\Updatproduit;
use App\User;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Validator;
use AuthenticatesUsers;

class AdminController extends Controller
{
    //Methode view login admin
    public function viewLoginAdin(){
        return view('auth.login');
    }

    //methode qui affiche la page d'accueil de l'admin
    public function adminView()
    {
        //SELECT * FROM produits
        //elequent laravel
        $produits = Produit::all();
        //dd($produits);


        //elle va returner une view du ficher admin
        return view('admin', compact('produits'));
    }

    //Methode d'acces à la vue pour ajouter un produit
    public function viewAddProduit()
    {
        $tags = Tag::all();
        //dd($tags);
        $produits = Produit::all();
        //dd($produits);
        $produit_recommandes = Produit::all();
//dd($produit_recommandes);
        $cat = Category::all();
        return view('admin.addProduit', compact('produits','tags','produit_recommandes','cat'));
    }


    //méthode qui rajoute des produits dans la db
    public function addAdminProduit(Request $request)
    {

        //dd($request);
//verifie que les champs 'required' sont bien rempli avant de lancer les informations dans la base de données
        $request->validate([
            'titre' => 'required',
            'hauteur' => 'required',
            'editeur' => 'required',
            'collection' => 'required',
            'description' => 'required',
            'prix_ht' => 'required',
            'category_id' => 'required',
            'photo' => 'required',
        ]);

        $addproduit = new Produit();

        $addproduit->titre = $request->titre;
        $addproduit->hauteur = $request->hauteur;
        $addproduit->editeur = $request->editeur;
        $addproduit->collection = $request->collection;
        $addproduit->description = $request->description;
        $addproduit->prix_ht = $request->prix_ht;
        $addproduit->photo = $request->photo;
        $addproduit->category_id = $request->category_id;

        $tags = $request->tags;
 //dd($tags);
        $produit_recommandes = $request->produit_recommande;
//dd($produit_recommandes);
        $addproduit->save();

        foreach($tags as $tag_id)
       {
            $addproduit->tags()->attach($tag_id);
       }
        foreach ($produit_recommandes as $produit_recommande)
        {
            $addproduit->recommandations()->attach($produit_recommande);
        }


        return redirect(route('login_mon_produit'))->with('success', "le produit {$addproduit->titre} a bien été rajouté");
    }

//supprimer un article dans l'admin
    public function delete(Request $request)
    {
        $produit = Produit::find($request->id);
//        Cart::remove($request->id);
        //dd($produit);
        $produit->delete();
        return redirect(route('login_mon_produit', compact('tags')))->with('success', "Le produit {$produit->titre}a bien été supprimé");
    }

//Methode d'acces à la vue pour modifier un produit
    public function viewReadProduit(Request $request)
    {
        $produit_recommande = Produit::all();
//dd($request->id);
       $cat = Category::all();
//        dd($cat);
        $tags = Tag::all();
       // dd($tags);
        //SELECT * FROM produits WHERE id = ?
        $produit = Produit::find($request->id);
//dd($produit);
        return view('admin.readProduit', compact('produit','produit_recommande','$produit_recommandes','tags','cat','produits'));
    }

//mettre à jour un produit

    public function update(Request $request, $id)
    {


        $addproduit= Produit::find($id);
        $addproduit->titre=$request->get('titre');
        $addproduit->hauteur=$request->get('hauteur');
        $addproduit->editeur=$request->get('editeur');
        $addproduit->collection=$request->get('collection');
        $addproduit->description=$request->get('description');
        $addproduit->prix_ht=$request->get('prix_ht');
        $addproduit->category_id=$request->get('category_id');
//dd($addproduit);
        if ($request->get('photo'))
        $addproduit->photo=$request->get('photo');

//   if ($request->produit_recommande)
        $produit_recommande = $request->produit_recommande;

            $addproduit->recommandations()->sync($produit_recommande);

//dd($produit_recommande);

   $tags = $request->tags;

$addproduit->tags()->sync($tags);
        //dd($tags);



        $addproduit->save();

//        foreach($tags as $tag_id)
//        {
//            $addproduit->tags()->sync($tag_id);
//        }


      // redirection vers le panier
      //Je vais ajouter à chaque redirect(‘nom de la route ‘) la méthode-> with(‘une clé ‘, ‘la valeur que je mettre’) ;
        return redirect(route('login_mon_produit'))->with('notice', "Le produit {$addproduit->titre} a bien été mis à jour");
  }

  //tag et cat _______________________________________________________________________________________________
//TAG

//Methode d'acces à la vue pour ajouter un tag
    public function viewAddTagCat()
    {
        //SELECT * FROM tags
        //elequent laravel
        $tags = Tag::all();
        //dd($tags);
        //je passe avec la méthode compact la varible $tags à ma view addTagCat
        return view('admin.addTagCat',compact('tags'));
    }


//

    //Methode d'acces à la vue pour ajouter un tag
    public function viewAddTag()
    {

        return view('admin.addTags');
    }


//méthode qui rajoute des tags dans la db
    public function addAdminTag(Request $request)
    {
        //dd($request);
//verifie que les champs 'required' sont bien rempli avant de lancer les informations dans la base de données
        $request->validate([
            'nom' => 'required',
        ]);

        $addtag = new Addtag();

        $addtag->nom = $request->nom;
        $addtag->save();
        return redirect(route('admin_add_tag_cat'))->with('success', "le tag {$addtag->nom} a bien été rajouté");
    }

//supprimer un article dans l'admin
    public function deleteTag(Request $request)
    {
        $tag = Tag::find($request->id);
//        Cart::remove($request->id);
        //dd($produit);
        $tag->delete();
        return redirect(route('admin_add_tag_cat'))->with('success', "Le tag {$tag->nom}a bien été supprimé");
    }

//Methode d'acces à la vue pour ajouter un tag
    public function viewReadTag(Request $request)
    {
//dd($request->id);
        //SELECT * FROM tags WHERE id = ?
        $tag = Tag::find($request->id);

        return view('admin.readTag', compact('tag'));
    }

    //mettre à jour un tag

    public function updatetag(Request $request, $id)
    {
        $tag= Updatatag::find($id);
        $tag->nom=$request->get('nom');

        $tag->save();

        //Je vais ajouter à chaque redirect(‘nom de la route ‘) la méthode-> with(‘une clé ‘, ‘la valeur que je mettre’) ;
        return redirect(route('admin_add_tag_cat'))->with('notice', "Le tag {$tag->nom} a bien été mis à jour");
    }

//-----------------------------------------------------------------------------------------
//Catégorie

//méthode qui donne accèe à la view categorie

    public function viewCategorie()
    {
        return view('admin.addCategorie');
    }

//méthode pour afficher toutes les catégorie
//
    public function viewAddCat()
    {
        //SELECT * FROM tags
        //elequent laravel
        $parent_id = Category::all();
        //dd($parent_id);
        //je passe avec la méthode compact la varible $tags à ma view addTagCat
        return view('admin.addCategorie',compact('parent_id'));
    }
//méthode qui donne accèe à la view categorie

    public function viewAddCats()
    {
        return view('admin.addCategories');
    }

    //Méthode qui ajoute des catégorie
    public function addAdminCat(Request $request)
    {
        //dd($request);
//verifie que les champs 'required' sont bien rempli avant de lancer les informations dans la base de données
        $request->validate([
            'nom' => 'required',
            'is_online' => 'required'
        ]);

        $addcat = new Category();
        $addcat->nom = $request->nom;

        $addcat->parent_id = $request->parent_id;


        $addcat->save();
        return redirect(route('admin_cat'))->with('success', "la catégorie {$addcat->nom} a bien été rajouté");
    }

    //supprimer une catégorie
    public function deleteCat(Request $request)
    {
        $cat = Category::find($request->id);
        //dd($cat);
        $cat->delete();
        return redirect(route('admin_cat'))->with('success', "La catégorie {$cat->nom}a bien été supprimée");
    }

    //Methode d'acces à la vue pour modifier une categorie
    public function viewReadCat(Request $request)
    {
        //dd($request->id);
        //SELECT * FROM tags WHERE id = ?
        $cat = Category::find($request->id);
//dd($cat);
        return view('admin.readCat', compact('cat'));
    }

    //Modifier une catégorie

    public function updateCat(Request $request, $id)
    {
        $cat= Category::find($id);
        $cat->nom=$request->get('nom');
        $cat->is_online= $request->get('is_online');

        $cat->save();

        //Je vais ajouter à chaque redirect(‘nom de la route ‘) la méthode-> with(‘une clé ‘, ‘la valeur que je mettre’) ;
        return redirect(route('admin_cat'))->with('notice', "La catégorie {$cat->nom} a bien été mis à jour");
    }
//    --------------------------------------------------------

public function homeAdmin(){
        return view('loginAdmin');
}


//------------------------------------------------------------------------

//deconnexion
public function deconnexion(Request $request){
    auth()->logout();
    //La méthode flush efface toutes les informations de la session en cours
    $request->session()->flush();
    //La méthode regenerate modifie l’identifiant de session pour éviter les attaques de fixation de session
    $request->session()->regenerate();

    return redirect('/');
}
//------------------------------------------------------
//voir page commande
    public function readCommande(){


//fais des jointure entre 3 table pour récupérer toutes les information lié à la commande
        $resultats = DB::table( 'commade_produits')
            ->join('commandes', 'commandes.id', '=', 'commade_produits.commande_id')
            ->join('adresses', 'adresses.id', '=', 'commandes.adresse_id')
            ->select('*')
            ->get();
                    //dd($resultats);
        return view('admin.readCommande', compact('resultats'

        ));
}
public function viewCommandeAdmin(Request $request)
{
    //fais des jointure entre 3 table pour récupérer toutes les information lié à la commande
    $resultats = DB::table('commade_produits')
        ->join('commandes', 'commandes.id', '=', 'commade_produits.commande_id')
        ->join('adresses', 'adresses.id', '=', 'commandes.adresse_id')
        ->select('*')
        ->where('commande_id','=', $request->id)

        ->get();

// dd($resultats);


    return view('admin.viewCommande', compact('resultats'));

}


}