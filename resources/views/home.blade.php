@extends('layouts.main')

@section('title', 'Perfil')

@section('content')

    <div id="home-container" class="mt-3 row">
        <h1 class="col-sm my-auto" style="color:white">Bem-vindo {{$firstName}}&nbsp;{{$lastName}}</h1>
        <!--<h1 class="col-sm my-auto">{{$firstName}}</h1>
        <h1 class="col-sm my-auto">{{$lastName}}</h1>-->
    </div>
    <div id="events-container" class="mt-3">
        <div class="row">
            <div class="mapouter col" style="text-align:left">
                <div class="gmap_canvas">
                    <iframe width="1000" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=funchal,%20madeira&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>.gmap_canvas {overflow:hidden;background:none!important;height:1080px;width:1080px;}</style>
                </div>
            </div>
            <div class="col" style="text-align:center">
                <h4 class="mb-4" style="text-align:center;color:white"><ion-icon name="bicycle"></ion-icon>&nbsp; Postos BEP</h4>
                <ul class="">
                    <li style="color:#206DE0"><a href="/home/avenidaMar"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Avenida do Mar (Estação de autocarros)</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/edificio2000"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Edifício 2000</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/avenidaMadalenas"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Avenida das Madalenas</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/tecnopolo"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Tecnopolo/Universidade da Madeira</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/mercado"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Mercado dos Lavradores</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/forum"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Centro Comercial Fórum Madeira</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/madeira"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Centro Comercial MadeiraShopping</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/marina"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Centro Comercial Marina</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/miradouro"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Miradouro das Neves</b></button></a></li><br>
                    <li style="color:#206DE0"><a href="/home/monte"><button type="button" class="btn btn-outline-primary h-100 w-100"><b class="d-block mx-auto">Monte (Igreja)</b></button></a></li><br>
                </ul>
            </div>
        </div>
        <!--<h2 class="mb-5">Editar perfil</h2>
        <div class="row justify-content-between">
            <div class="col">
                <a href="/profile/name-editing" ><button type="button" class="btn btn-outline-primary h-100 w-100"><ion-icon name="create" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Nome próprio</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/username-editing" ><button type="button" class="btn btn-outline-primary h-100 w-100"><ion-icon name="person" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Nome de utilizador</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/password-editing" ><button type="button" class="btn btn-outline-primary h-100 w-100"><ion-icon name="key" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Palavra-chave</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/email-editing" ><button type="button" class="btn btn-outline-primary h-100 w-100"><ion-icon name="mail" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Email</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/phone-number-editing" ><button type="button" class="btn btn-outline-primary h-100 w-100"><ion-icon name="phone-portrait" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Número de telemóvel</b></button></a>
            </div>
            <div class="col">
                <a href="/profile/profile-photo-editing" ><button type="button" class="btn btn-outline-primary h-100 w-100"><ion-icon name="camera" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Foto de perfil</b></button></a>
            </div>
        </div>-->
    <!--<form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="mb-1 form-group">
            <div class="row gx-1">
                <div class="col ps-0">
                    <div class="mb-1 form-floating">
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                        <label for="first_name" class="label required">Primeiro nome</label>
                    </div>
                </div>
                <div class="col ps-1">
                    <div class="mb-1 form-floating">
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                        <label for="first_name" class="label required">Último nome</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 mb-2 form-floating">
            <input type="text" class="form-control" id="username" name="username" required>
            <label for="username" class="label required label-top">Nome de utilizador</label>
        </div>
        <div class="mt-2 mb-2 form-floating">
            <input type="text" class="form-control" id="password" name="password" required>
            <label for="password" class="label required label-top">Palavra-chave</label>
        </div>
        <div class="mt-2 mb-2 form-floating">
            <input type="email" class="form-control" id="email" name="email" required>
            <label for="email" class="label required label-top">Email</label>
        </div>
        <div class="mt-2 mb-2 form-floating">
            <input type="number" class="form-control" id="phone_number" name="phone_number" required>
            <label for="phone_number" class="label required label-top">Telemóvel</label>
        </div>
        <div class="mb-2 form-floating">
            <div class="form-control p-0">
                <label for="profile_photo" class="d-block float-start label required text-start label-opacity px-2 pt-2 pb-4">Foto de perfil</label>
                <input type="file" class="mt-2 opacity-0 position-absolute" id="profile_photo" name="profile_photo" required>
            </div>
        </div>
    </form> -->
    </div>
@endsection
