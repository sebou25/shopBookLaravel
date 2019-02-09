<?php

namespace App\Http\Controllers\Shop;

use App\Produit;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
class CartController extends Controller
{



    //Ajouter un produit au panier
    public function add(Request $request){
        //permets d'appeler le nom du produit dans la base de données
        $produit = Produit::find($request->id);
        Cart::add(array(
            'id' => $produit->id,
            'name' => $produit->titre,
            'price' => $produit->prix_ht,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$produit->photo,'prix_ttc'=>$produit->prixTTC())
        ));
        //Je vais ajouter à chaque redirect(‘nom de la route ‘) la méthode-> with(‘une clé ‘, ‘la valeur que je mettre’) ;
    return redirect(route('cart_index'))->with('success',"le produit {$produit->titre} a bien été rajouté au panier");

    }

    //afficher les produits du panier
    public function index(){

        $content = Cart::getContent();
       // dd($content);

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 5.50%',
            //condition de type taxe
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '5.50%'

        )); //dd($condition);
            //appel de ma condition
        Cart::condition($condition);

//        gère le total ht et ttc
        $total_ht_panier = Cart::getSubTotal();
       //dd( $total_ht_panier );
        $total_ttc_panier = Cart::getTotal();

        //gestion de la tva
        $tva = $total_ttc_panier - $total_ht_panier ;
        return view('cart.index',compact('content', 'total_ttc_panier','total_ht_panier','tva'));
    }

    //Mettre à jour la quantité d'un produit dans le panier
    public function update(Request $request){
        //permet d'appeler le nom du produit dans la base de données
        $produit = Produit::find($request->id);
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        // redirection vers le panier
        //Je vais ajouter à chaque redirect(‘nom de la route ‘) la méthode-> with(‘une clé ‘, ‘la valeur que je mettre’) ;
        return redirect(route('cart_index'))->with('notice', "La quantité du produit {$produit->nom} a bien été mise à jour");
    }

    //supprimer un article dans le panier
    public function delete(Request $request){
//     //permet d'appeler le nom du produit dans la base de données
        $produit = Produit::find($request->id);
        Cart::remove($request->id);

        // redirection vers le panier dans la base de données
        //Je vais ajouter à chaque redirect(‘nom de la route ‘) la méthode-> with(‘une clé ‘, ‘la valeur que je mettre’) ;
        return redirect(route('cart_index'))->with('success',"Le produit {$produit->nom}a bien été supprimé du panier" );
    }



}
