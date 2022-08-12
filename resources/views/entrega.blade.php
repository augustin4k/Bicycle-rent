@extends('layouts.main')

@section('title', 'Bem-vindo - BEP')

@section('content')
<div id="create-container" class="row mt-3">
        <div id="welcome-in-container" class="col-md-9 text-center">
            <h1 class="mt-2 mb-5" style="text-align: center">Selecione o posto de chegada:</h1>
            <form method="POST" action="/entregarBicicleta" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-2 mb-2 form-floating">
                                <!--<input type="selectbox" class="form-control" id="posto" name="posto" required>-->
                                <label for="title" class="label required label-top">Selecione o posto pretendido</label>
                                <select name="posto" id="posto" required>
                                <option disabled selected value>  </option>
                                <option value="1">Avenida do mar (estação de autocarro)</option>
                                <option value="2">Edifício 2000</option>
                                <option value="3">Avenida das Madalenas</option>
                                <option value="4">Tecnopolo/Universidade da Madeira</option>
                                <option value="5">Mercado dos Lavradores</option>
                                <option value="6">Centro Comercial Fórum Madeira</option>
                                <option value="7">Centro Comercial Madeira Shopping</option>
                                <option value="8">Centro Comercial Marina</option>
                                <option value="9">Miradouro da Neves</option>
                                <option value="10">Monte (igreja)</option>
                                </select>     
                            </div>
                            <input type="submit" class="btn btn-primary" value="Entregar Bicicleta">
            </form>
 
        </div></div>
@endsection