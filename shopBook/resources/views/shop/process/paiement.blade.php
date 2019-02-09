@extends('process')

@section('content')
    {{--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">--}}
    <div class="conteneurColPaie"></div>
<nav class="navarainePaie" aria-label="breadcrumb">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Panier</a></li>
        <li class="breadcrumb-item"><a href="#">Identification</a></li>
        <li class="breadcrumb-item"><a href="">Adresse</a></li>
        <li class="breadcrumb-item active" aria-current="page">Paiement</li>
        <li class="breadcrumb-item"><a href="#">Merci</a></li>
    </ol>
</nav>

<main role="main">

    <div class="container textpaiement">
        <div class="py-5 text-center text-centerPaie">
            <i class="fab fa-4x fa-cc-visa"></i>
            <i class="fab fa-cc-stripe"></i>
            <i class="fab fa-4x fa-cc-mastercard"></i>


            <h2 class="titrePaiement">Paiement par Carte Bancaire</h2>
            <h4 class="mt-5">Total de votre panier à régler: {{number_format($total_ttc_panier,2)}} TTC</h4>

        </div>

        <div class="row">

            <div class="col-md-12 order-md-1">



                {{--form de paiement stripe--}}
                <form action="{{route('commande_stripe')}}" method="POST">
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_YEdf0u7H1v0ODnXpz02PGvif"
                            data-amount="{{$total_ttc_stripe}} TTC"
                            data-name="test seb"
                            data-description="paimment de la commande sur PhiliaBook"
                            data-image="{{asset('produits/image_paiement.png')}}"
                            data-locale="auto"
                            data-currency="eur">
                    </script>
                    {{--masquer le bouton de paiement stripe--}}
                    <script>
                        document.getElementsByClassName('stripe-button-el')[0].style.display = 'none';
                    </script>
                    <button class="btn btn-warning btn-lg btn-block boutAccedeP" type="submit">Accéder au paiement sécurisé</button>
                </form>


            </div>
        </div>
    </div>
</main>




@endsection