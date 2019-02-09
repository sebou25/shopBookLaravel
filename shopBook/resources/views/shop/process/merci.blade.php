@extends('process')

@section('content')
    <link href="{{asset('css/login.css')}}" rel="stylesheet">

    <div class="conteneurColPaie"></div>
    <nav class="navarainePaie" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panier</a></li>
            <li class="breadcrumb-item"><a href="#">Identification</a></li>
            <li class="breadcrumb-item"><a href="">Adresse</a></li>
            <li class="breadcrumb-item"><a href="#">Paiement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Merci</li>
            <li class="breadcrumb-item"><a href="{{route('decon')}}">Retour à l'accueil</a></li>
        </ol>
    </nav>
    <main role="main" class="mainMerci">
        <div class="container merci">
            <div class="py-5 text-center">
                <img src="{{asset('img/merci.gif')}}">
                <h2>Nous vous remercions pour votre commande</h2>
                <p class="lead"> Elle sera traitée avec soin et rapidité</p>
            </div>
        </div>
    </main>
@endsection