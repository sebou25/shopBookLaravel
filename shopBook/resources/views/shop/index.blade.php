@extends('home')
{{--je fais une section qui fait référence au yiel du fichier home.blade.php--}}
@section('content')

    <div class="album py-5 bg-light">
    <div class="container">





        <div class="row">
            @foreach($produits as $produit)
            <div class="col-md-6 col-lg-4">
                <div class="card mb-6 lg-4 shadow-sm">
                    <a href="{{route('voir_produit',['id'=>$produit->id])}}" title="Voir {{$produit->titre}}"><img class="card-img-top card-img-top1" src="{{ asset('produits/'.$produit->photo )}}" alt="Card image cap"></a>
                    <div class="card-body contenuProdCat">

                        <h2>{{$produit->titre}}</h2>
                        <hr>
                        <span class="badge bgCat"><a href="{{route('voir_produit_par_cat',['id'=>$produit->category->id])}}" title="Voir catégorie {{$produit->category->nom}}">
                                    {{--je lui dis d'appeler ma category qui est dans le model--}}
                                {{$produit->category->nom}}</a></span>
                        <br><br>

                        <table>
                            <tr>
                                <td>Auteur:</td>
                                <td>{{$produit->hauteur}}</td>

                            </tr>
                            <tr>
                                <td>Editeur:</td>
                                <td>{{$produit->editeur}}</td>
                            </tr>
                            <tr>
                                <td>Collection:</td>
                                <td>{{$produit->collection}}</td>

                            </tr>
                        </table>
                        <hr>


                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price"><strong>{{$produit->prixTTC()}}  €</strong></span>
                            <a href="{{route('voir_produit',['id'=>$produit->id])}}" class="btn btn-sm btn-outline-secondary" title="Voir {{$produit->titre}}"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</div>

{{--fermeture de la section--}}
@endsection