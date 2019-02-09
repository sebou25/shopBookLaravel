@extends('shop')

@section('content')
    <div class="arial fixed-top">
    <nav  aria-label="breadcrumb ">
        <div class="lienarianprod">
        <ol class="breadcrumb lienarianprodNav">
            @if($produit->category->parent !== null)
            <li class="breadcrumb-item"><a href="{{route('voir_produit_par_cat',['id'=>$produit->category->parent->id])}}">{{$produit->category->parent->nom}}</a></li>
         @endif
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('voir_produit_par_cat',['id'=>$produit->category->id])}}">{{$produit->category->nom}}</a></li>

            @if($produit->category->parent !== null)
            <li class="breadcrumb-item"><a href="{{route('voir_produit_par_cat',['id'=>$produit->category->children->id])}}">{{$produit->category->children->nom}}</a></li>
            @endif


        </ol>
        </div>
    </nav>
    </div>

    <main role="main">

        <div class="container toproduit">

            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <div class="card cardproduitunité sm-4 box-shadow">
                        <img class="card-img-top" src="{{asset('produits/'.$produit->photo)}}" alt="Card image cap">

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="contenuProd">
                    <hr>

                    <h2>{{$produit->titre}}</h2>
                        <br>
                    <h4 class="price"><strong>{{$produit->prixTTC()}}  €</strong></h4>
                    <h5 class="card-text">
                        Auteur : {{$produit->hauteur}} <br>
                        Editeur : {{$produit->editeur}} <br>
                        Collection : {{$produit->collection}} </h5>
                        <hr>
                        <p>{{$produit->description}}</p>


                        <hr>
                    <div class="tags">
                        @foreach($produit->tags as $tag)
                            {{--{{dd($tag)}}--}}
                            <span class="badge bgCat"><a href="{{route('voir_produit_par_tag',['id'=>$tag->id])}}" title="voir tag {{$tag->nom}}">
                                    {{--je lui dis d'appeler mon tag qui est dans le model--}}
                                    {{$tag->nom}}</a></span>
                        @endforeach
                    </div>
                         <hr>

                    <form action="{{route('cart_add',['id'=>$produit->id])}}" method="post" id="panier_add">
                        @csrf
                        <label for="qty">Quantité</label>
                        <input class="form-control qteprod" name="qty" id="qty" type="number" value="1">
                    </form>
                        <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au Panier</button>
                        <hr>
                    </div>
                </div>
            </div>
        </div>


  @if( count($produit->recommandations) >0)
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <h3>Vous aimerez aussi :</h3>
                </div>

                <div class="row">

                    @foreach($produit->recommandations as $produit_recommande)
                    <div class="col-md-4 col-sm-6 ">
                        <div class="card produitAime mb-4  box-shadow">
                            <a href="{{route('voir_produit',['id'=>$produit_recommande->id])}}">    <img  src=" {{asset('produits/'.$produit_recommande->photo)}}" class="card-img-top card-img-topAime  img-fluid" alt="livre" data-toggle="tooltip"  title="Voir {{$produit_recommande->titre}}"></a>
                            <div class="produitRecommande">

                            <h2>{{$produit_recommande->titre}}</h2>
                            <br>
                            <h4 class="price"><strong>{{$produit_recommande->prixTTC()}}  €</strong></h4>
                            </div>
                            <br>
                            <div class="card-body">
                                <div class="d-flex justify-content-end">
                                    <div class="btn-group btVoirAime">
                                        <a href="{{route('voir_produit',['id'=>$produit_recommande->id])}}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="right" title="Voir {{$produit_recommande->titre}}"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
            </div>
            </div>


        @endif
    </main>

@endsection