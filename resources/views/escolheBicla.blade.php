@extends('layouts.main')

@section('title', 'Criação de Eventos')

@section('content')
<?php
use Carbon\Carbon;

?>
<div id="create-container" class="row mt-3">
    <div id="event-create-container" class="col-md-6 text-center">

        <h1 class="mt-2 mb-5" style="text-align: center">Escolha a bicicleta pretendida</h1>
        <form action="/events/create" method="POST">
            @csrf
            <div class="mt-2 mb-2 form-floating">
                <!--<input type="selectbox" class="form-control" id="posto" name="posto" required>-->
                <label for="title" class="label required label-top">Bicicleta</label>
                <select name="idBicla" id="idBicla" required>
                <option disabled selected value>  </option>
                @foreach ($bicicletas as $bicla)
                <option value="<?php echo $bicla->id ?>">{{$bicla->id}}</option>
                @endforeach
                </select>     
            </div>
            
            <p class="mb-5 form-floating" style="color: red">Os campos assinalados (*) são de preenchimento obrigatório.</p>
            <input type="hidden" name="posto" id="posto" value="<?php echo $posto ?>">
            <input type="hidden" name="horaReserva" id="horaReserva" value="<?php echo $horaReserva ?>">
            <input type="submit" class="btn btn-primary" value="Agendar">
        </form>          
    </div>
</div>

@endsection