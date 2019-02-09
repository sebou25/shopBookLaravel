<div class="message">
    {{--je regarde si dans la session la clé ‘notice’ est déffinit--}}
    @if(session('notice'))
<div class="alert alert-info" role="alert">
    {{--j'affiche le contenu--}}
   {{session('notice')}}
</div>
    @endif
    {{--je regarde si dans la session la clé ‘error’ est déffinit--}}
    @if(session('error'))
<div class="alert alert-danger" role="alert">
    {{--j'affiche le contenu--}}
    {{session('error')}}
</div>
    @endif
    {{--je regarde si dans la session la clé ‘success’ est déffinit--}}
    @if(session('success'))
<div class="alert alert-success" role="alert">
    {{--j'affiche le contenu--}}
   {{session('success')}}
</div>
    @endif
</div>