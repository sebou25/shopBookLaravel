<header>

    <div class="navbar navbar-dark bg-dark fixed-top box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="" class="navbar-brand d-flex align-items-center btTop" title="remonter">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" > </path> </svg>
                <h1  class="titre_site">Philia Book</h1>
            </a>
            <div class="espacepanierTopDiv">
            <a class="nav-link espacepanierTop" href="{{route('cart_index')}}"><i class="fa fa-shopping-cart"></i> Panier <span class="badge badge-warning text-white">{{$total}}</span></a>
            </div>
            {{--<div class="connexion">--}}
            {{--<a class="nav-link" href="{{route('login')}}">Connexion </a>--}}
        {{--</div>--}}

            </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-red nav2">

        <div class="accueil"><a class="navbar-brand" href="{{route('homepage')}}">Accueil</a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav espace_lien_nav">
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('voir_produit_par_cat',['id'=>$category->id])}}">{{$category->nom}}</a>
                </li>
                @endforeach
            </ul>
            {{--<ul class="navbar-nav ">--}}
                {{--<li class="nav-item contnrutEspacepanier">--}}
                    <a class="nav-link espacepanier" href="{{route('cart_index')}}"><i class="fa fa-shopping-cart"></i> Panier <span class="badge badge-warning text-white">{{$total}}</span></a>
                {{--</li>--}}
            {{--</ul>--}}


        </div>
        {{--<a class="nav-link espacepanier" href="{{route('cart_index')}}"><i class="fa fa-shopping-cart"></i> Panier <span class="badge badge-warning text-white">{{$total}}</span></a>--}}

    </nav>



</header>