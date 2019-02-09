@extends('shop')

@section('content')
    <nav class="navarainePanier" >

        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current= "page">Panier</li>
            <li class="breadcrumb-item"><a href="#">Identification</a> </li>
            <li class="breadcrumb-item"><a href="#">Adresse</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Paiement</a></li>
            <li class="breadcrumb-item"><a href="#">Merci</a></li>
        </ol>
    </nav>

    {{--<div class="navAriane fixed-top">--}}
        {{--<nav aria-label="breadcrumb">--}}

            {{--<ol class="breadcrumb">--}}
                {{--<li class="breadcrumb-item">Panier</li>--}}
                {{--<li class="breadcrumb-item" ><a href="#">Identification</a></li>--}}
                {{--<li class="breadcrumb-item"><a href="#">Adresse</a></li>--}}
                {{--<li class="breadcrumb-item active" aria-current="page"><a href="#">Paiement</a></li>--}}
                {{--<li class="breadcrumb-item"><a href="#">Merci</a></li>--}}

            {{--</ol>--}}
        {{--</nav>--}}
    {{--</div>--}}

    <main role="main">
        <section class="py-5 corpanier">
            <div class="container">
                <div class="textPanier">

                <h1 class="jumbotron-heading"> <span class="badge  ">Votre panier </span></h1>
                    @include('layouts.message')
                </div>
                @if($total_ttc_panier > 0)

                <table class="table table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th class="text-center">Produit</th>
                        <th class="text-center">Quantité</th>
                        <th class="text-center" width="90px">Supprimer</th>
                        <th class="text-center">P.U  TTC</th>
                        <th class="text-center">Total TTC</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $produit)
                    <tr>
                        <td class="text-center">
                            <img width="110" class="rounded-circle img-thumbnail" src="{{asset('produits/'.$produit->attributes['photo'])}}" alt=""><br>
                    <div class="titrePanier"><strong>{{$produit->name}}</strong></div>
                        </td>
                        <td>

                           <form id="panier_update" action="{{route('cart_update',['id'=>$produit->id])}}" method="post">
                        @csrf

                            <input name="quantity" style="display: inline-block" id="qte" class="form-control col-sm-4" type="number" value="{{$produit->quantity}}"><button class="refresh" type="submit" form="panier_update" title="mettre à jour"><i class="fas fa-sync"></i> </button>


                            </form>

                        </td>

                        <td  class="text-center  ">

                            {{--<button class="iconedelet"  title="supprimer">--}}
                                {{--<a onclick="return confirm('Êtes-vous sûr de vouloir supprimer {{$produit->titre}} ')" href="{{route('cart_delete',['id'=>$produit->id])}}" ><i class="fa fa-trash  "></i></a>--}}
                            {{--</button>--}}

                            <!-- Button trigger modal -->
                                <div class="delbt">



                            <button type="button" class="btn btn-light " data-toggle="modal" data-target="#exampleModal" title="supprimer">
                                <i class="fa fa-trash  "> <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer {{$produit->titre}} ')" href="{{route('cart_delete',['id'=>$produit->id])}}" >

                                </a></i>
                                 </button>
                                </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de vouloir supprimer {{$produit->titre}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btYesDelet">
                                            <a class="btn btn-primary" href="{{route('cart_delete',['id'=>$produit->id])}}" role="button">Oui</a>
                                            </div>
                                                <div class="btNoDelet">
                                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Non</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>

                        <td class="text-center">
                            {{$produit->attributes['prix_ttc']}} €
                        </td>
                        <td class="text-center">
                            {{ number_format($produit->attributes['prix_ttc'] * $produit->quantity,2) }} €
                        </td>
                    </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-center">Total HT</td>
                        <td class="text-center">{{number_format($total_ht_panier,2)}} €</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-center">TVA (5.50%)</td>
                        <td class="text-center">{{number_format($tva,2)}} €</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-center">Total TTC </td>
                        <td class="text-center">{{number_format($total_ttc_panier,2)}} €</td>
                    </tr>
                    </tfoot>
                </table>
                <a class="btn btn-block btn-outline-dark btCommande " href="{{route('commande_identification')}}">Commander</a>

                @else
                    <p>Votre panier ne contient aucun produit</p>
                    <img src="https://media.giphy.com/media/AQbiUzxhIlM6k/giphy.gif"  height="200px" width="300px" alt="">
                @endif
            </div>
        </section>
    </main>

@endsection