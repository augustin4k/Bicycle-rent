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
            <div class="mapouter col">
                <div class="gmap_canvas">
                    <iframe width="1000" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=Funchal,%20Avenida%20do%20Mar&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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
    </div>
@endsection
