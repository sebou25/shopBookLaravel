@extends('process')

@section('content')
    <div class="conteneurColAdresse"></div>
    <div class="navArianeAdresse fixed-top">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panier</a></li>
            <li class="breadcrumb-item " ><a href="#">Identification</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adresse</li>
            <li class="breadcrumb-item " aria-current="page"><a href="#">Paiement</a></li>
            <li class="breadcrumb-item"><a href="#">Merci</a></li>

        </ol>
    </nav>
    </div>
    <main role="main" class="adressFootBotom">

        <div class="container">
            <div class="py-5 text-center">
                <i class="fab fa-studiovinari"></i>
                <h2>Votre adresse de livraison</h2>
            </div>
            <div class="row">
                <div class="col-md-12 order-md-1">
                    {{--condition qui affiche un message d'erreur--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                            </ul>
                        </div>
                        @endif
                    {{--<form class="needs-validation" novalidate>--}}
                        <form action="{{route('commande_adresse_store')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="prenom">Votre prénom</label>
                                <input type="text" value="{{old('prenom')}}" class="form-control" id="prenom" name="prenom">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="nom">Votre nom <span class="text-danger">*</span></label>
                                <input type="text" value="{{old('nom')}}" class="form-control" id="nom" name="nom">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="telephone">Votre téléphone <span class="text-danger">*</span></label>
                                <input type="text" value="{{old('telephone')}}" class="form-control" id="telephone" name="telephone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="adresse">Votre adresse <span class="text-danger">*</span></label>
                            <input type="text" value="{{old('adresse')}}" class="form-control" id="adresse" name="adresse">
                        </div>
                        <div class="mb-3">
                            <label for="adresse2">Adresse 2<span class="text-muted"> (Optionnel)</span></label>
                            <input type="text" value="{{old('adresse2')}}" class="form-control" id="adresse2" name="adresse2">
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="ville">Votre ville <span class="text-danger">*</span></label>
                                <input type="text" value="{{old('ville')}}" class="form-control" id="ville" name="ville">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="code_postal">Votre code postal <span class="text-danger">*</span></label>
                                <input type="text" value="{{old('code_postal')}}" class="form-control" id="code_postal" name="code_postal">
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="pays">Votre pays <span class="text-danger">*</span></label>
                                <select class="custom-select d-block w-100" id="pays" name="pays" required>
                                    <option value="FR">France</option>
                                    <option value="BE">Belgique</option>
                                    <option value="CH">Suisse</option>
                                </select>
                            </div>
                        </div>
                        <hr class="mb-4">
                            <button class="btn btn-warning btn-lg btn-block boutAccedeP" type="submit">Procéder au paiement</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection