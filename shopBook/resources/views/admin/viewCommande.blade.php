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
    <h4 class="h2 text-white ">Gestion du site PhiliaBook</h4>
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

                    <li class="nav-item">

                            <a class="nav-link" href="{{route('read_commande')}}">Retour à la liste des commandes</a>

                    </li>
                </ul>
            </div>

        </nav>
        {{--{{dd($resultats)}}--}}
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 topContenaireCommande">
            <br>
            {{--{{dd($resultats)}}--}}
                @foreach($resultats as $resultat)


            <div class="table-responsive">
                <div class="jumbotron">
                    <h4 class="h2">N° commande: {{$resultat->commande_id}}</h4>
                    <h1 class="display-6">{{$resultat->nom}} {{$resultat->prenom}}</h1>
                    <p class="lead">adresse</p>
                    <p>{{$resultat->adresse}}  <br> {{$resultat->adresse2}}  <br> {{$resultat->code_postal}} - {{$resultat->ville}} - {{$resultat->pays}}</p>
                    <p>Numéro de transaction Stripe: {{$resultat->charge_id_stripe}}</p>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Date de commande</th>
                        <th>Qté</th>
                        <th>Produit</th>
                        <th>P.U TTC</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$resultat->created_at}}</td>
                        <td>{{$resultat->qte}} </td>
                        <td>{{$resultat->nom_du_produit}}</td>
                        <td>{{$resultat->prix_unitaire_ttc}} € TTC</td>
                        <td class="text-right">{{$resultat->prix_total_ttc}} € TTC</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>Sous-Total HT:</td>
                        <td class="text-right">{{$resultat->total_ht}} € HT</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>TVA(5.5%)</td>
                        <td class="text-right">{{number_format($resultat->tva,2)}} € TTC</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>TOTAL TTC</td>
                        <td class="text-right">{{$resultat->total_ttc}} € TTC </td>
                    </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
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