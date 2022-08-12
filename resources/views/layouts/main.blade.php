<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonte do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!--CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <!-- CSS do site -->
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/scripts.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav class="navbar py-0 navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav row w-100 me-auto mb-2 mb-lg-0">
                        <li class="ms-3 col nav-item">
                            <a href="/home" class="nav-link text-decoration-none text-center"><ion-icon name="home" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Início</b></a>
                        </li>
                        <li class="ms-3 col nav-item">
                            <a href="/events" class="nav-link text-decoration-none text-center"><ion-icon name="book" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Histórico Reservas</b></a>
                        </li>
                        <li class="ms-5 col nav-item">
                            <a href="/events/create" class="nav-link text-decoration-none text-center"><ion-icon name="create" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Reservar</b></a>
                        </li>
                        <li class="ms-5 col nav-item">
                            <a href="/history" class="nav-link text-decoration-none text-center"><ion-icon name="paper" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Recibos</b></a>
                        </li>
                        <li class="ms-5 col nav-item">
                            <a href="/profile" class="nav-link text-decoration-none text-center"><ion-icon name="person" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Perfil</b></a>
                        </li>
                        <li class="ms-5 col nav-item">
                            <a href="/utilizacao" class="nav-link text-decoration-none text-center"><ion-icon name="camera" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Utilizar</b></a>
                        </li>
                        <li class="ms-5 col nav-item">
                            <a href="/entregarBicicleta" class="nav-link text-decoration-none text-center"><ion-icon name="flag" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Entrega</b></a>
                        </li>
                        <li class="ms-5 col nav-item">
                            <a href="{{route('logout')}}" class="nav-link text-decoration-none text-center"><ion-icon name="log-out" size="large" class="d-block mx-auto"></ion-icon><b class="d-block mx-auto">Terminar Sessão</b></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                    @endif
                    @if(session('msg-error'))
                            <p class="msg-error">{{session('msg-error')}}</p>
                        @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="mt-3 position-static">
        <a href="/ajuda">Precisas de Ajuda?</a>
    <p class="mb-3">&copy; 2022 BEP - Bicicletas Elétricas Partilhadas</p>
    
    <a href="/home" class="navbar-brand d-inline-block align-content-center mx-auto">
    
        <img src="/img/bep_logo.png" alt="BEP" style="size: 5px">
    </a>
</footer>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
</html>
