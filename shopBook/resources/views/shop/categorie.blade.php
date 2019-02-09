@extends('shop')

@section('content')
    <div class="arial fixed-top">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                @if(isset($category))
                    @if($category->parent_id !== null)
                        <li class="breadcrumb-item active lienAriane" aria-current="page"><a href="{{route('voir_produit_par_cat',['id'=>$category->parent->id])}}">{{$category->parent->nom}}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{$category->nom}}</li>

                    @foreach($category->childrens as $children)
                        <li class="breadcrumb-item  lienAriane"  >
                            {{--<a href="{{route('voir_produit_par_cat',['id'=>$children->id])}}">--}}
                                {{$children->nom}}
                            {{--</a>--}}
                        </li>

                    @endforeach
                @else

                    <li class="breadcrumb-item active" aria-current="page">{{$tag->nom}}</li>
                @endif

            </ol>
        </nav>
    </div>

<div class="backazur">
    <main role="main">
        <div class="container">
        <div class="py-3">
            <div class="container-fluid">
                <div class="row">
                    @foreach($produits as $produit)
                        <div class="col-md-6 col-lg-4">
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <a href="{{route('voir_produit',['id'=>$produit->id])}} "title="Voir {{$produit->titre}}"><img src="{{asset('produits/'.$produit->photo)}}" class="card-img-top2 img-fluid " alt="{{$produit->nom}}"></a>
                            <div class="card-body contenuProdCat">
                                <h2>{{$produit->titre}}</h2>
                                <hr>
                                @foreach($produit->tags as $tag)
                                    {{--{{dd($tag)}}--}}
                                    <span class="badge bgCat"><a href="{{route('voir_produit_par_tag',['id'=>$tag->id])}}" title="Voir tag {{$tag->nom}}">
                                    {{--je lui dis d'appeler mon tag qui est dans le model--}}
                                            {{$tag->nom}}</a></span>
                                @endforeach
                                <hr>
                                <h5 class="card-text">Auteur : {{$produit->hauteur}}</h5>

                                <h5 class="card-text">Editeur    : {{$produit->editeur}} </h5>
                                <h5 class="card-text">  Collection : {{$produit->collection}}</h5>

                                {{--<p class="card-text">{{$produit->description}}  </p>--}}
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                   <strong> <span class="price">{{$produit->prixTTC()}} €</span></strong>
                                    <a href="{{route('voir_produit',['id'=>$produit->id])}}" class="btn btn-sm btn-outline-secondary" title="Voir {{$produit->titre}}"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
        </div>
    </main>
</div>


@endsection