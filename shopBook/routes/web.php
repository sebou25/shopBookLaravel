<?php

Route::get('/',"Shop\MainController@index")->name('homepage');

Route::get('/produit/voir/{id}','Shop\MainController@produit')->name('voir_produit');

Route::get('/categorie/{id}','Shop\MainController@viewByCategory')->name('voir_produit_par_cat');

Route::get('/tag/{id}','Shop\MainController@viewByTag')->name('voir_produit_par_tag');



Route::post('panier/add/{id}','Shop\CartController@add')->name('cart_add');
Route::get('panier','Shop\CartController@index')->name('cart_index');
Route::post('/panier/update/{id}','Shop\CartController@update')->name('cart_update');
Route::get('/panier/delete/{id}','Shop\CartController@delete')->name('cart_delete');

//route pour l'identification
Route::get('/commande/identification','Shop\ProcessController@identification')->name('commande_identification');
//route qui rediriqe vers le formulaire adresse
Route::get('/commande/adresse','Shop\ProcessController@adresse')->name('commande_adresse');
//stocker dans la db les datas du form adresse
Route::post('/commande/adresse/store','Shop\ProcessController@adresseStore')->name('commande_adresse_store');
//route qui redirige vers la page paiement
Route::get('/commande/paiement','Shop\ProcessController@paiement')->name('commande_paiement');



Auth::routes();
//en cas de succes d'identification j'aurai une rediction vers cette uri
//Route::get('/home', 'HomeController@index')->name('home');





//route accueil admin


//Route::get('/login','Shop\AdminController@viewLoginAdin')->name('view_Login_Admin');

//route pour voir tous lesproduits
Route::get('addProduit','Shop\AdminController@viewAddProduit')->name('admin_view_add');

//route pour add nouveau produit
Route::post('addProduit','Shop\AdminController@addAdminProduit')->name('admin_new_produit');

//route pour supprimer produit
Route::get('admin/delete/{id}','Shop\AdminController@delete')->name('cart_delete_admin');

//route pour voir un produit
Route::get('admin/readProduit/{id}','Shop\AdminController@viewReadProduit')->name('admin_read_produit');

//route pour mettre à jour un produit
Route::post('admin/readProduit/{id}','Shop\AdminController@update')->name('admin_update_produit');

//------------------------------

//route pour afficher l'admin tag Categorie
Route::get('admin/addTagCat','Shop\AdminController@viewAddTagCat')->name('admin_add_tag_cat');


//route pour view rajouter un tag
Route::get('admin/addTags','Shop\AdminController@viewAddTag')->name('admin_view_add_tags');

//route pour add nouveau tag
Route::post('admin/addTags','Shop\AdminController@addAdminTag')->name('admin_new_tag');

//route pour supprimer produit
Route::get('admin/addTagCat/delete{id}','Shop\AdminController@deletetag')->name('delete_tag');

//route pour voir un tag
Route::get('admin/readTag/{id}','Shop\AdminController@viewReadTag')->name('update_tag');

//route pour mettre à jour un tag
Route::post('admin/reaTag/{id}','Shop\AdminController@updatetag')->name('mettre_a_jour_tag');


//-------------------------------------------------------

//route qui donne accèe à la view categorie
Route::get('admin/addCategorie','Shop\AdminController@viewCategorie')->name('admin_view_categorie');

//route pour afficher toutes les catégorie
Route::get('admin/addCategorie','Shop\AdminController@viewAddCat')->name('admin_cat');

//route pour view rajouter une categorie
Route::get('/admin/addCategories','Shop\AdminController@viewAddCats')->name('view_add_categories');

//route pour add nouveau categorie
Route::post('admin/addCategories','Shop\AdminController@addAdminCat')->name('admin_add_new_cat');

//route pour supprimer categorie
Route::get('admin/addCategories/deleteCat{id}','Shop\AdminController@deleteCat')->name('delete_cat');

//route pour voir categorie à modifier
Route::get('admin/addCategories/readCat{id}','Shop\AdminController@viewReadCat')->name('update_cat');

//route pour modfier categorie
Route::post('admin/addCategories/updateCat{id}','Shop\AdminController@updateCat')->name('mettre_a_jour_cat');
//---------------------------------------------------------------------------
//route pour déconnexion
Route::get('/deconnexion','Shop\AdminController@deconnexion')->name('decon');

//-------------------------------------------------------------------------

//route pour l'uri du paiement
Route::post('/commande/stripe','Shop\ProcessController@stripe')->name('commande_stripe');

Route::get('/commande/merci','Shop\ProcessController@merci')->name('commande_merci');

//route debug mail confirmation
//Route::get('/mailable/commande', function () {
//    //debug choper une commande, la 7
//    $commande = \App\Commande::find(7);
//    return new \App\Mail\CommandeConfirmation($commande);
//});


//________________________________________________________________________

//connection admin

//pour sécuriser une route on le met middleware
Route::middleware(['check.admin'])->group(function (){
    Route::get('/admin', 'Shop\AdminController@adminView')->name('login_admin_connect');
});

Route::post('/admin', 'Auth\LoginController@loginMonProduit')->name('login_mon_produit');


//------------------------------------------------------

//view page commande
Route::get('/admin/readCommande', 'Shop\AdminController@readCommande')->name('read_commande');



Route::get('/admin/viewCommand/{id}', 'Shop\AdminController@viewCommandeAdmin')->name('view_commande');




