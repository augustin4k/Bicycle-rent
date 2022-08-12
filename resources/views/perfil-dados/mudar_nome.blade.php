@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')

    <div id="search-container" class="mt-3 row">
        <h1 class="col-sm my-auto">{{$firstName}}&nbsp;{{$lastName}}</h1>
    </div>
    <div id="events-container" class="mt-3">
        <a href="/profile" class="icon-edit position-relative top-0 start-100"><ion-icon name="close-circle" size="large"></ion-icon></a>
        <h2 class="mb-5">Editando: Nome próprio</h2>
        <form action="{{route('users.update',\Illuminate\Support\Facades\Auth::user())}}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-1 form-group">
                    <div class="row gx-1">
                        <div class="col ps-0">
                            <div class="mb-1 form-floating">
                                <input type="text" class="form-control" id="new_first_name" name="new_first_name" required>
                                <label for="new_first_name" class="label required">Primeiro nome pretendido</label>
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-1 form-floating">
                                <input type="text" class="form-control" id="new_last_name" name="new_last_name" required>
                                <label for="new_last_name" class="label required">Último nome pretendido</label>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mb-3 form-floating" style="color: red">Os campos assinalados (*) são de preenchimento obrigatório.</p>
                <input type="submit" class="btn btn-outline-third" value="Editar">
            </form>
        </div>
@endsection
