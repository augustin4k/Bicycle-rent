@extends('layouts.main')

@section('title', 'Os meus agendamentos')

@section('content')

    <div id="search-container" class="mt-3 col-md-12">
        <div class="row justify-content-center">
            <div id="events-container" class="mt-3">
                <h2>As minhas reservas</h2>
                <div id="cards-container" class="row">
                    @if($userEvents != NULL)
                        <ul class="list-group">
                            @foreach($userEvents as $userEvent)
                                <li class="list-group-item ms-3">
                                        <div class="card-schedule"><b>Dia: </b> {{\Carbon\Carbon::parse($userEvent['hora_reserva'])->format('d-M')}}</div>
                                        <div class="card-schedule"><b>Hora da reserva: </b>{{\Carbon\Carbon::parse($userEvent['hora_reserva'])->format('H:i')}}</div>
                                        <p class="card-schedule">
                                            <b>Hora de utilização: </b>
                                            {{\Carbon\Carbon::parse($userEvent['hora_inicial'])->format('H:i')}}
                                            - {{\Carbon\Carbon::parse($userEvent['hora_final'])->format('H:i')}}
                                        </p>
                                        <p class="card-schedule"><b>Custo: </b>{{ $userEvent['custo'] }}</p>
                                    <br>
                                </li>
                                <br>
                            @endforeach
                        </ul>
                    @else
                        <h3 class="my-auto">Ainda não realizou reservas</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
