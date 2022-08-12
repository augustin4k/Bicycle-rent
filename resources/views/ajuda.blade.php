@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')

    <div id="search-container" class="mt-3 row">
        <h1 class="col-sm my-auto">Central de ajuda</h1>
    </div>
    <div id="events-container" class="mt-3">
        <a href="/home" class="icon-edit position-relative top-0 start-100"><ion-icon name="close-circle" size="large"></ion-icon></a>
        <h5 class="mb-5">Primeiramente, segue os seguintes passos:</h5>
        <form action="/ajuda" method="POST">
            @csrf
                <div class="mb-1 form-group">
                    <div class="row gx-1">
                        <div class="col ps-0">
                            <div class="mb-1 form-floating">
                                <ul>
                                    <li>1- Assegura-te que estás autenticado na aplicação BEP para usufruires da mesma.</li>
                                    <li>2- Caso queiras fazer uma reserva, acede à secção de reservar na barra superior.</li>
                                    <li>3- Caso queiras usar uma bicicleta na hora, acede à secção de utilização na barra superior.</li>
                                    <li>4- Caso queiras entregar a bicicleta, acede à secção de entregar bicicleta na barra superior.</li>
                                    <li>5- Caso queiras obtar por um plano de pagamento diferente, dirige-te à secção perfil na barra superior.</li>
                                    <li>6- Caso queiras ver as tuas reservas feitas, acede à secção de reservas na barra superior.</li>
                                    <li>7- Caso queiras ver os teus recibos, acede à secção de recibos na barra superior.</li>
                                    <li>8- Caso queiras saber e localizar os postos BEP, acede à página inicial.</li>
                                    <li>9- Caso queiras sair da aplicação, clica terminar sessão na barra superior.</li>
                                    <li>10- Caso não tenha resolvido a tua dúvida, podes enviar um ticket, na caixa de texto ao lado.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-1 form-floating">
                                <textarea class="form-control" id="notes" name="notes" required></textarea>
                                <label for="notes" class="label required">Escreve aqui as tuas dúvidas</label>
                            </div>
                            <p class="mb-5 form-floating" style="color: red">Os campos assinalados (*) são de preenchimento obrigatório.</p>
                            <input type="submit" class="btn btn-outline-third" value="Enviar Ticket">
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection