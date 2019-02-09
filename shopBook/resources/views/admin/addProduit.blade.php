<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('../img/book.ico')}}">

    <title>PhiliaBook/Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('../../css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('../../css/backend.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-red flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-sm-3 col-md-2 mr-0 logoBackCommande" href="#">Philia Book</a>
    <h1 class="h2 text-white ">Gestion du site PhiliaBook</h1>
    <div class="quitter">
        <ul class="navbar-nav px-3 ">
            <li class="nav-item text-nowrap ">
                <a class="nav-link text-white " href="{{route('decon')}}">Quitter</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar navLatAdmin">
            <div class="sidebar-sticky">
                <ul class="nav flex-column navCommandeGauche">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login_mon_produit')}}">
                            <span data-feather="file"></span>
                            Produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_add_tag_cat')}}">
                            <span data-feather="shopping-cart"></span>
                            Tags
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_cat')}}">
                            <span data-feather="shopping-cart"></span>
                            Catégories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('read_commande')}}">
                            <span data-feather="users"></span>
                            Commandes
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom topContenaireCommande">
                <h4 class="h2">Ajouter un produit</h4>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary newProdAdmin">
                            <a class="nav-link" href="{{route('login_mon_produit')}}">Retour liste des produits</a>
                        </button>
                    </div>
                </div>
            </div>
            {{--condition qui affiche un message d'erreur--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="form-add-prod" action="{{route('admin_new_produit')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titre">Titre du produit</label>
                        <input type="text" value="{{old('titre')}}"  class="form-control" id="titre" name="titre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prix_ht">PRIX H.T</label>
                        <input type="text" value="{{old('prix_ht')}}" class="form-control" id="prix_ht" name="prix_ht">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="hauteur">Auteur du produit</label>
                        <input type="text" value="{{old('hauteur')}}"  class="form-control" id="hauteur" name="hauteur">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="editeur">Editeur du produit</label>
                        <input type="text" value="{{old('editeur')}}"  class="form-control" id="editeur" name="editeur">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="collection">Collection du produit</label>
                        <input type="text" value="{{old('collection')}}"  class="form-control" id="collection" name="collection">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" ></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="photo">Photo du produit</label>
                        <input type="file" value="{{old('photo')}}"  class="form-control-file" id="photo" name="photo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Catégorie</label>
                        <select multiple required  class="form-control form-control-lg" id="category_id" name="category_id">  <optgroup label="Catégorie">
                          @foreach($cat as $cats)
@if ($cats->parent_id == null)


                                <option value="{{$cats->id}}">{{$cats->nom}}</option>
                                    @endif
                            @endforeach


                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tags">Sélectionner un ou plusieurs Tags</label>
                        {{--{{dd($tags)}}--}}

                        <select class="form-control"  name="tags[]" id="tags" multiple>

                            @foreach($tags as $tag)
                                <option   value="{{$tag->id}}">{{ $tag->nom }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="produit_recommande">Produits recommandés</label>
                        <select multiple class="form-control" name="produit_recommande[]" id="produit_recommande">


                            @foreach($produit_recommandes as $produit_recommande)

                                <option value="{{$produit_recommande->id}}">{{$produit_recommande->titre}}</option>
                                {{--{{dd($produit_recommandes)}}--}}
                            @endforeach
                                {{--@foreach($produit_recommandes as $produit_recommande)--}}

                                {{--<option--}}
                                        {{--@if ($produit->recommandations->contains($produit_recommande) ) selected--}}
                                        {{--@endif--}}
                                        {{--value="{{$produit_recommande->id}}">{{$produit_recommande->titre}}</option>--}}
                                {{--{{dd($produit_recommandes)}}--}}
                            {{--@endforeach--}}

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark" form="form-add-prod">Valider</button>
            </form>
        </main>
    </div>
</div>




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{asset('../../js/popper.min.js')}}"></script>
<script src="{{asset('../../js/bootstrap.min.js')}}"></script>
<script src="{{asset('../../js/holder.min.js')}}"></script>


</body>
</html>