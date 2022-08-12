@extends('layouts.main')

@section('title', 'Perfil')

@section('content')

    <div id="home-container" class="mt-3 row">
        <h1 class="col-sm my-auto">{{$firstName}}&nbsp;{{$lastName}}</h1>
    </div>
    <div id="events-container" class="mt-3">
        <h2 class="mb-5">Editar perfil</h2>
        <div class="row justify-content-between">
            <div class="col">
                <a href="/profile/name-editing" ><button type="button" class="btn btn-outline-secundary h-100 w-100"><ion-icon name="create" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Nome próprio</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/username-editing" ><button type="button" class="btn btn-outline-secundary h-100 w-100"><ion-icon name="person" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Nome de utilizador</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/password-editing" ><button type="button" class="btn btn-outline-secundary h-100 w-100"><ion-icon name="key" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Palavra-chave</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/mudar-plano" ><button type="button" class="btn btn-outline-secundary h-100 w-100"><ion-icon name="wallet" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Mudar plano de Pagamento</b></button></a>
            </div>
        </div>
    </div>
@endsection
