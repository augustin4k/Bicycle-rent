@extends('layouts.out')

@section('title', 'Início de Sessão')

@section('content')

    <div id="create-container" class="row mt-3">
        <div id="welcome-in-container" class="col-md-6 text-center">
            <h1 class="mt-2 mb-5" style="text-align: center">Iniciar sessão</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mt-2 mb-2 form-floating">
                    <input type="text" class="form-control" id="username" name="username" required>
                    <label for="username" class="label label-top">Nome de utilizador</label>
                </div>
                <div class="mt-2 mb-2 form-floating">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <label for="password" class="label label-top">Palavra-chave</label>
                </div>
                <div class="row align-content-start">
                    <div class="col">
                        <a href="/register" class="mb-3" style="color: #005DB1">Não tens conta ainda?</a>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3" value="Entrar">
            </form>
        </div>
    </div>

@endsection
