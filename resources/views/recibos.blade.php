@extends('layouts.main')

@section('title', 'O meu histórico')

@section('content')

    <div id="search-container" class="mt-3 col-md-12">
        <div class="row justify-content-center">
            <div id="events-container" class="mt-3">
                <h2>Recibos</h2>
                <div id="cards-container" class="row">
                    @if($userEvents != NULL)
                        <ul class="list-group">
                            @foreach($userEvents as $userEvent)
                            @if ($userEvent['utilizacao'] == "plano_anual")
                                <li class="list-group-item ms-3">
                                    <div class="card-schedule"><b>Recibo:</b>&nbsp; Plano de Pagamento Anual</div>

                                    <p class="card-schedule"><b>Custo: </b>{{$userEvent['custo']}} €</p>
                                    <br>
                                    <div class="align-content-center">

                                    </div>
                                </li>
                                <br>
                                @elseif ($userEvent['utilizacao'] == "pagamento_cartao")
                                <li class="list-group-item ms-3">
                                    <div class="card-schedule"><b>Recibo:</b>&nbsp; Viagem:</div>

                                    <p class="card-schedule"><b>Custo: </b>{{$userEvent['custo']}} €</p>
                                    <br>
                                    <div class="align-content-center">

                                    </div>
                                </li>
                                <br>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <h3 class="my-auto">De momento não tem recibos</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection