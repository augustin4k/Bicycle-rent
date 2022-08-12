@extends('layouts.main')

@section('title', 'Bem-vindo - BEP')

@section('content')
<style >
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button2 {
  background-color: white;
  color: black;
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
.foto {
  text-align: right;
  background-color: lightgrey;
  width: 300px;
  border: 1px solid black;
  padding: 50px;
  margin: 5px;
}
.flex-container {
  display: flex;
  background-color: white;
}

.flex-container > div {
  margin: 20px;
  padding: 20px;
  font-size: 30px;
}

.imagem{
    height: 375px;
    width: 430px;
}
</style>
    <div id="create-container" class="row mt-3">
        <div id="welcome-in-container" class="col-md-9 text-center">
            <h1 class="mt-2 mb-5" style="text-align: center">Apresente o QR code da bicicleta e selecione o posto de partida:</h1>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


                
                
                <div id="my_camera" style="margin-left: auto; margin-right: auto;"></div>
                
                <br/>
                <form method="POST" action="/utilizacao" enctype="multipart/form-data">
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
                <input type="submit" class="btn-outline-primary" id="submit" name="submit" value="Submeter QR" >
                </form>
                
               


               
            <script language="JavaScript">
                Webcam.set({
                    width: 490,
                    height: 390,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });

                Webcam.attach( '#my_camera' );

                function take_snapshot() {
                    Webcam.snap( function(data_uri) {
                        $(".image-tag").val(data_uri);
                        document.getElementById('results').innerHTML = '<img class = "imagem" src="'+data_uri+'"/>';
                    } );
                }

                let myVar = setInterval(myTimer ,1000);
                function myTimer() {
                const d = new Date();
                    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
                }

                $("#fimUso").click(function(){
                    const c = new Date();
                    document.getElementById("fim").innerHTML =  c.toLocaleTimeString();
                })



            </script>
        </div>
    </div>

@endsection
