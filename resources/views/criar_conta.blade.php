@extends('layouts.out')

@section('title', 'Criação de Conta')

@section('content')

    <div id="create-container" class="row mt-3">
        <div id="welcome-in-container" class="col-md-6 text-center">
            <h1 class="mt-2 mb-5" style="text-align: center">Criação de conta</h1>
            <h2 class="mt-2 mb-5" style="text-align: center">Preencha os seguintes campos</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('store-user')}}" method="POST" enctype="multipart/form-data">
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
                                <label for="last_name" class="label required">Último nome</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-2 form-floating">
                    <input type="text" class="form-control" id="username" name="username" required>
                    <label for="username" class="label required label-top">Nome de utilizador</label>
                </div>
                <div class="mt-2 mb-2 form-floating">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <label for="password" class="label required label-top">Palavra-chave</label>
                </div>
                <h2 class="mt-4 mb-3" style="text-align: center;color: white">Escolha o método de pagamento pretendido</h2>
                <input type="radio" id="pagamento" name="pagamento" style="text-align: left" value="pagamento_cartao"required>
                <label for="pagamento-cartao">
                    <p style="color:black">Pagamento Automático com Cartão &nbsp&nbsp&nbsp</p>
                </label>
                <input type="radio" id="pagamento" name="pagamento" style="text-align: left" value="pagamento_anual" required>
                <label for="pagamento-anual">
                    <p style="color:black">Plano Anual</p>
                </label>
                <p class="mt-3 mb-3 form-floating" style="color: red">Os campos assinalados (*) são de preenchimento obrigatório.</p>
                <div class="col mb-3">
                    <a href="/login" style="color: #FFFFFF">Já tens conta?</a>
                </div>
                <input type="submit" class="btn btn-primary" value="Criar">
            </form>
        </div>
    </div>

@endsection
