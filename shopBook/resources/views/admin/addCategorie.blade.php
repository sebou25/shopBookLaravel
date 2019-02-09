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
                <h4 class="h2">Catégories</h4>

                <div class="btn-toolbar mb-2 mb-md-0 pull-right">

                    <button class="btn btn-sm btn-outline newProdAdmin"><a class="nav-link" href="{{route('view_add_categories')}} " >Nouvelle Catégorie </a></button>

                </div>
            </div>
            @include('layouts.message')
            <div class="table-responsive">
                <table class="table table-sm table-striped">
                    <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Nom de la catégories</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($parent_id as $cat)

                    <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nom}} / {{$cat->parent_id}}</td>
                    <td>
                    <a href="{{route('update_cat',['id'=>$cat->id])}}"  class="btn btn-sm btn-outline-info">Voir / Modifier</a>

                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer {{$cat->nom}} ')" href="{{route('delete_cat',['id'=>$cat->id])}}" class="btn btn-sm btn-outline-danger">Supprimer</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
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