{{--<!doctype html>--}}
{{--<html lang="fr">--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="">--}}
    {{--<link rel="icon" href="{{asset('img/book.ico')}}">--}}

    {{--<title>Philia Book</title>--}}

    {{--<!-- Bootstrap core CSS -->--}}
    {{--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">--}}
    {{--<!-- Custom styles for this template -->--}}
    {{--<link href="{{asset('css/album.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('css/livres.css')}}" rel="stylesheet">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">--}}

    {{--<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>--}}


{{--<body >--}}

    {{--<header>--}}

        {{--<div class="navbar navbar-dark bg-dark fixed-top box-shadow">--}}
            {{--<div class="container d-flex justify-content-between">--}}
                {{--<a href="" class="navbar-brand d-flex align-items-center btTop">--}}
                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"> </path> </svg>--}}
                    {{--<h1  class="titre_site">Philia Book</h1>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-red nav3">--}}
            {{--<div class="collapse navbar-collapse justify-content-center" id="navbarNav">--}}


            {{--</div>--}}
        {{--</nav>--}}

    {{--</header>--}}
    {{--<main role="main">--}}

        {{--<section class="jumbotron text-center topMailMerci">--}}
            {{--<div class="container ">--}}
                {{--<h1 class="jumbotron-heading">Merci pour votre commande !</h1>--}}
                {{--<p class="lead text-muted">Nous avons bien pris en compte votre commande. <br> Elle est en cours de préparation.</p>--}}

            {{--</div>--}}


            {{--<div class="container">--}}
            {{--<div class="cardMail text-center ">--}}
                {{--<div class="card-header">--}}
                    {{--<h2>Adresse de Livraison</h2>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">{{$commande->adresse->prenom}} {{$commande->nom}}</h5>--}}
                    {{--<p class="card-text">{{$commande->adresse->adresse}}<br />--}}
                        {{--{{$commande->adresse->adresse2}}<br />--}}
                        {{--{{$commande->adresse->ville}}{{$commande->adresse->code_postal}}{{$commande->adresse->pays}}</p>--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table">--}}
                            {{--<thead class="thead-dark">--}}
                            {{--<tr>--}}
                                {{--<th scope="col">Qté</th>--}}
                                {{--<th scope="col">Photo</th>--}}
                                {{--<th scope="col">Produit</th>--}}
                                {{--<th scope="col">Total TTC</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($commande->produits as $produit)--}}
                            {{--<tr>--}}
                                {{--<td scope="row">{{$produit->pivot->qte}}</td>--}}
                                {{--<td class="text-center"> <img width="100" src="{{asset('produits/'.$produit->photo)}}" alt="item1"></td>--}}
                                {{--<td class="text-center">{{$produit->pivot->nom_du_produit}}</td>--}}
                                {{--<td class="text-center">{{number_format($produit->pivot->prix_total_ttc,2)}} €</td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                            {{--<tfoot>--}}
                            {{--<tr>--}}
                                {{--<td colspan="2"></td>--}}
                                {{--<td class="text-center">Sous-Total HT</td>--}}
                                {{--<td class="text-center">{{number_format($commande->total_ht,2)}} €</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td colspan="2"></td>--}}
                                {{--<td class="text-center">TVA 5.50%</td>--}}
                                {{--<td class="text-center">{{number_format($commande->tva,2)}} €</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td colspan="2"></td>--}}
                                {{--<td class="text-center">Total TTC </td>--}}
                                {{--<td class="text-center">{{number_format($commande->total_ttc,2)}} €</td>--}}
                            {{--</tr>--}}
                            {{--<tr><td colspan="3"></td>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                            {{--</tfoot>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</section>--}}






    {{--</main>--}}
    {{--<footer class="text-muted">--}}
        {{--<div class="container foot" >--}}
            {{--<p class="float-right">--}}
                {{--<a href="" class="btTop">Remonter</a>--}}
            {{--</p>--}}
            {{--<p><i class="far fa-copyright"></i> Philia book </p>--}}
            {{--<p><a class="nav-link" href="{{route('decon')}}">Quitter</a></p>--}}
        {{--</div>--}}
    {{--</footer>--}}

    {{--<!-- Bootstrap core JavaScript--}}
    {{--================================================== -->--}}
    {{--<!-- Placed at the end of the document so the pages load faster -->--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}

    {{--<script src="../../js/popper.min.js"></script>--}}
    {{--<script src="../../js/bootstrap.min.js"></script>--}}
    {{--<script src="../../js/holder.min.js"></script>--}}
{{--</body>--}}
{{--</html>--}}