@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')

    <div id="search-container" class="mt-3 row">
        <h1 class="col-sm my-auto">{{$firstName}}&nbsp;{{$lastName}}</h1>
    </div>
    <div id="events-container" class="mt-3">
        <a href="/profile" class="icon-edit position-relative top-0 start-100"><ion-icon name="close-circle" size="large"></ion-icon></a>
        <h2 class="mb-5">De momento encontra-se com o {{$pagamentoView}}</h2>
        @if ($pagamento == "pagamento_anual")
        <p>Pretende mudar para o plano de Pagamento Automático com Cartão?</p>
        @else
        <p>Pretendo mudar para o plano de Pagamento Anual?</p>
        @endif
        <form action="{{route('users.update',\Illuminate\Support\Facades\Auth::user())}}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-1 form-group">
                    <div class="row gx-1">
                        <div class="col ps-0">
                            <div class="mb-1 form-floating">
                            <input type="submit" class="btn btn-outline-third" name="mudar" value="Mudar">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection