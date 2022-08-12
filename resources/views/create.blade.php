@extends('layouts.main')

@section('title', 'Criação de Eventos')

@section('content')
<?php
use Carbon\Carbon;

?>
<div id="create-container" class="row mt-3">
    <div id="event-create-container" class="col-md-6 text-center">
        <?php if($reservas->count() == 0){?>
        <h1 class="mt-2 mb-5" style="text-align: center">Preencha os seguintes campos</h1>
        <form action="/events/escolheBicicleta" method="POST">
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
            <!--<div class="mb-2 form-floating">
                <input type="date" class="form-control" id="date" name="date" required>
                <label for="date" class="label required">Data</label>
            </div>-->
            <div class="mb-2 form-group">
                <div class="row gx-1">
                    <div class="col ps-0">
                        <div class="mb-1 form-floating">
                            <label for="beginning_hour" class="label required label-top">Hora da Reserva</label>
                            <!--<input type="time" class="form-control" id="beginning_hour" name="beginning_hour" required>-->
                            <select name="horaReserva" id="horaReserva" required>
                            <option disabled selected value> </option>
                            <option value="<?php echo Carbon::now('+00:05')?>"><?php echo Carbon::now('+00:05')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:10')?>"><?php echo Carbon::now('+00:10')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:15')?>"><?php echo Carbon::now('+00:15')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:20')?>"><?php echo Carbon::now('+00:20')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:25')?>"><?php echo Carbon::now('+00:25')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:30')?>"><?php echo Carbon::now('+00:30')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:35')?>"><?php echo Carbon::now('+00:35')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:40')?>"><?php echo Carbon::now('+00:40')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:45')?>"><?php echo Carbon::now('+00:45')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:50')?>"><?php echo Carbon::now('+00:50')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+00:55')?>"><?php echo Carbon::now('+00:55')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:00')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:05')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:10')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:15')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:20')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:25')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:30')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:35')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:40')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:45')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:50')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+01:55')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>
                            <option value="<?php echo Carbon::now('+02:00')?>"><?php echo Carbon::now('+01:00')->format('H:i') ?></option>

                            </select>
                            
                        </div>
                    </div>
                    <!--<div class="col pe-0">
                        <div class="mb-1 form-floating">
                            <input type="time" class="form-control" id="ending_hour" name="ending_hour" required>
                            <label for="final_hour" class="label required">Hora final</label>
                        </div>
                    </div>-->
                    <!--<br></br>
                    <?php /*
                        $teste = Carbon::now();
                        $teste2 = Carbon::now('+00:10');
                        $diferença = intdiv($teste->diffInSeconds(' '.$teste2.' ') , 60); // divisão inteira
                        $resto = $teste->diffInSeconds(' '.$teste2.' ') % 60;   // resto da divisão                        
                        if ($resto > 0){ //p
                            $diferença += 1;
                        }
                        echo $diferença .'  !  ' . $resto ;
                    */?>
                     <br></br>-->
                </div>
            </div>
            <!--<div class="mb-2 form-floating">
                <textarea class="form-control" id="notes" name="notes"></textarea>
                <label for="notes" class="label">Campo de Observações</label>
            </div>-->
            <p class="mb-5 form-floating" style="color: red">Os campos assinalados (*) são de preenchimento obrigatório.</p>
            <input type="submit" class="btn btn-primary" value="Escolher Bicicleta">
        </form>

        <?php }else{?>
            <h1 class="mt-2 mb-5" style="text-align: center">Você já tem uma reserva ativa, pretende cancelar?</h1>
            @foreach ($reservas as $reserva)
                    <table align='center'>
                    <thead>
                        <tr>
                            <th>Data de criação </th>
                            <th>Hora da Reserva</th>
                            <th>Posto</th>
                            <th>Bicicleta</th>
                         </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                        <tr>
                            <td>{{ $reserva->created_at }}</td>
                            <td>{{ $reserva->hora_reserva }}</td>
                            <td>{{ $posto->nome}}</td>
                            <td>{{ $reserva->bicicleta_id }}</td>
                        </tr>
                        <tr></tr>
                    </tbody>
                    </table>
                    @endforeach

                    <br><a href="/utilizacao"><button type="button" class="btn btn-blue-primary h-100 "><b class="d-block mx-auto">Utilizar</b></button></a>
                    <a href="/events/cancelar"><button type="button" class="btn btn-red-primary h-100" color="red"><b class="d-block mx-auto">Cancelar</b></button></a>
                    
        <?php }?>                  
    </div>
</div>

@endsection