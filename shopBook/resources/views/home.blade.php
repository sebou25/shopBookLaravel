<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/book.ico')}}">

    <title>Philia Book</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/album.css')}}" rel="stylesheet">
    <link href="{{asset('css/livres.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>

@include('layouts.header')

<p id="top"></p>
<main  role="main">

    <section class="py-5 text-center">
        <div class="container">
            <div class="border_t_p">
            <h2  class="jumbotron-heading">Amoureux des livres et de la lecture   <br><span class="badge badge-light">vous trouverez</span> <br>votre bonheur <span class="badge badge-primary ">ici <span class="fin_text">!</span></span></h2>
               <p class="lead text-muted text_intro">De tout ce qui est écrit, je n’aime que ce que l’on écrit avec son propre sang.</p>
            </div>
        </div>
    </section>

    {{--zone d'insertion de l'héritage de l'enfant--}}
    @yield('content')


</main>

<footer class="text-muted">
        <div class="container foot" >
            <p class="float-right">
                <a href="" class="btTop">Remonter</a>
            </p>
            <p><i class="far fa-copyright"></i> Philia book </p>
            <p><a class="nav-link" href="{{route('decon')}}">Quitter</a></p>
        </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>


<script type="text/javascript">
    var scrollTop = $("#top");
    $('.btTop').click(function() {

        console.log('click');

        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;

    });
</script>

{{--<script src="{{asset('js/script.js')}}"></script>--}}
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>