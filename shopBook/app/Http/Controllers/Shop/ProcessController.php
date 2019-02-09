<?php

namespace App\Http\Controllers\Shop;

use App\Adresse;
use App\CommadeProduit;
use App\Commande;
use App\Mail\CommandeConfirmation;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Stripe\Stripe;
use Illuminate\Support\Facades\Mail;
class ProcessController extends Controller
{
    //constructor qui permet de ne plus voir la page login une fois connecté
    public function __construct()
    {
        //appele d'un middelware 'guest'(par défault dans laravel)
        //si je suis 'guest' je peut voir le formulaire d'identification' mais pas les autre class grace au ->only(‘identification’) ;
        $this->middleware('guest')->only('identification');
    }

    //appel l'identification
    public function identification()
    {
        //retourne dans le dossier: shop et le sous dossier process la page identification
        return view('shop.process.identification');
    }



//redirige vers la view de la page adresse
    public function adresse()
    {
        return view('shop.process.adresse');
    }

    //enregistrement du formulaire
    public function adresseStore(Request $request)
    {
        //Auth:: service qui permet de récupérer l'utilisateur
        $user = Auth::user();

        //dd($request);
        $request->validate([
            //les champs à valider, je peux dire le nombre de caractère max, les champs obligatiores, les champs uniques...
            'prenom' => 'required',
            'nom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required|digits:5',
            'ville' => 'required',
            'pays' => 'required',
        ]);
        $adresse = new Adresse();
        //dd($adresse);
        //me permet de remplir automatiquement tous all() les attributs de mon model
        // avec un  tableau que j’ai déjà sur mon objet $request
        $adresse->fill($request->all());

        $adresse->save();

        //sur cette utilisateur je vais lui passer une valeur pour lui récupérer la clé étrangère qui sera = à l'adresse que je suis entrain de créer
        $user->adresse_id = $adresse->id;
        $user->save();

        return redirect(route('commande_paiement'));
    }

//    --------------------------------------------------------------------
//paiement

//view pour la page paiement et affichage du total panier
    public function paiement()
    {
        //recupère le montant du panier
        $total_ttc_panier = Cart::getTotal();
//permet d'afficher le montant autre qu'en centime en * par 100
        $total_ttc_stripe = $total_ttc_panier * 100;
        return view('shop.process.paiement', compact('total_ttc_panier', 'total_ttc_stripe'));
    }

    //methode qui gère le paiement stripe
    public function stripe(Request $request)
    {
        //dd($request);
        //echo ('stripe');

        //recupère le montant du panier
        $total_ttc_panier = Cart::getTotal();
//permet d'afficher le montant autre qu'en centime en * par 100
        $total_ttc_stripe = $total_ttc_panier * 100;

        //variable pour récupérer le client (pour ne pas enregistrer deux carte de paiemment)
        $user = Auth::user();

        //je place la clé secrete que je récupère sur mon site stripe 'apiKey'
        $stripe = new Stripe('sk_test_zacpQ6ihAdh8mvrZBN5KJQBV',
            //indique la version que j'utilise de stipe pour éviter d'voir des problèmes s'il y a une mise à jour
            '2018-09-24');

//gestion des erreurs avec try qui les recupère en bas avec catch(..) les éventuelle exeption récupéré par stripe
        try {
            //customer = client qui porte sur l'e-mail saisi que je récupère
            $customer_id_stripe = $user->customer_id_stripe;
            //condition qui vérifie si le client n'a pas (empty) un compte stripe
            //alors j'effectue pas l'étape qui la suit
            if (empty($user->customer_id_stripe)) {
                //création du client
                $customer = $stripe->customers()->create([
                    'email' => $request->email,
                ]);
                //une fois le compte client crée, je stocke dans l'attribut la valeur (customer) qui met retourner
                // c'est à dire l'identifiant et je le stocke dans l attribut customer_id_stripe
                // pour le récupérer à la prochaine visite
                $user->customer_id_stripe = $customer['id'];
                $user->save();
                $customer_id_stripe = $customer['id'];
            }

//dd($customer);

//création d'une carte
// je rajoute le numéro client avec $customer['id'] et le stripe_token que je recupère de la request (jeton de paiememnt qui est un numéro unique récupéré au moment ou je paie
            $card = $stripe->cards()->create($customer_id_stripe, $request->stripeToken);
            //je mets le compte($customer_id_stripe) utilisateur à jour (update) avec un tableau ['default_source']
            //qui me permetre de mettre la carte à jour
            $stripe->customers()->update($customer_id_stripe, ['default_source' => $card['id']]);
//dd($card);
            //test paiement
            //la méthode charge() récupère la carte enregistré par dafault
            $charge = $stripe->charges()->create([
                //recupération du numéro client
                'customer' => $customer_id_stripe,
                'currency' => 'EUR',
                'amount' => $total_ttc_panier,
            ]);
        }
            //gestion des erreurs avec try qui les recupère en bas avec catch(..) les ventuelle exeption récupéré par stripe

            //les données envoyées sont mauvaises
        catch (\Cartalyst\Stripe\Exception\BadRequestException $e) {
            $message = $e->getMessage();
        } //clé API stripe n'est pas bonne
        catch (\Cartalyst\Stripe\Exception\UnauthorizedException $e) {
            $message = $e->getMessage();
        } //dans le cas d'un 404
        catch (\Cartalyst\Stripe\Exception\InvalidRequestException$e) {
            $message = $e->getMessage();
        } catch (\Cartalyst\Stripe\Exception\NotFoundException $e) {
            $message = $e->getMessage();
        } //s'il un problème sur le numéro de carte
        catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            $message = $e->getMessage();
        }
            //
            //s'il un problème de server
        catch (\Cartalyst\Stripe\Exception\ServerErrorException $e) {
            $message = $e->getMessage();
        }
        if (isset($message)) {
            return redirect(route('commande_stripe'))->with('message', $message);
        } else {
            $this->commande($charge['id']);
            $request->session()->put('is_payed',true);
            return redirect(route('commande_merci'));
        }
        //débug qui affiche le numéro de transation de carte
        //echo $charge['id'];
    }

    //methode qui retourne la page merci
    public function merci(Request $request)
    {
        $is_payed =$request->session()->get('is_payed', false);
        if ($is_payed) {
            //echo'merci';
            return view('shop.process.merci');
        }else{
            return redirect(route('homepage'));
        }
    }

        // créer une commande
        private function commande($charge_id_stripe){
        //dd($charge_id_stripe);
        //gère le total ht et ttc
        $total_ht_panier = Cart::getSubTotal();
       //dd( $total_ht_panier );
        $total_ttc_panier = Cart::getTotal();
        //retour de methode qui donne un tableau contenant mes produits
         $produits = Cart::getContent();
    //recupère l'utisateur
            $user = Auth::user();
        $tva = $total_ttc_panier - $total_ht_panier;

        $commande = new Commande();
        $commande->taux_tva = 5.5;
        $commande->total_ht = $total_ht_panier;
        $commande->total_ttc = $total_ttc_panier;
        $commande->tva=$tva;
        $commande->charge_id_stripe = $charge_id_stripe;
        $commande->user_id = $user->id;
        $commande->adresse_id = $user->adresse->id;
        $commande->save();
//dd($commande);
        foreach($produits as $produit){
//            dd($produit);
            //pour chaque produit on va faire un nouveau
            $commande_produit = new CommadeProduit();
            $commande_produit->qte = $produit['quantity'];
            $commande_produit->prix_unitaire_ttc = $produit['attributes']['prix_ttc'];
            $commande_produit->prix_unitaire_ht = $produit['price'];
            $commande_produit->prix_total_ttc = $produit['attributes']['prix_ttc']*$produit['quantity'];
            $commande_produit->prix_total_ht = $produit['price']*$produit['quantity'];
            $commande_produit->nom_du_produit = $produit['name'];
            //mise en place clé étrangère pour associer une commande et un produit
            $commande_produit->commande_id = $commande->id;
            $commande_produit->produit_id = $produit->id;
           // dd($commande_produit);
            $commande_produit->save();
            }

           //dd($user,$commande);
            //envoie de l'email de confirmation
            //récupère l'adresse email de l'utilisateur connecté et la commande
//Mail::to($user->email)->send(new CommandeConfirmation($commande));

}


}