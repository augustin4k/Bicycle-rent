<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Recibo;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class UtilizacaoController extends Controller
{
    public function use(){
        $emUtilizacao = DB::table('reservas')->where('cliente_id', '=' , Auth::user()->id )->where('estado','=', "ativo")->first();
        $emUtilizacao1 = DB::table('reservas')->where('cliente_id', '=' , Auth::user()->id )->where('estado','=', "ativo_semreserva")->first();
        if($emUtilizacao || $emUtilizacao1)
        {
            return redirect('/entregarBicicleta')->with('msg-error','Tem que entregar a bicicleta antes de utilizar uma nova.');
        }
        else{
            return view('camera');
        }
        
    }

    public function startusing(Request $request){
        $id = Auth::user()->id;
        $hora_atual = Carbon::now();
        //reservas pendentes no posto selecionado
        $reservascliente = DB::table('reservas')->where('cliente_id', '=' , $id)->where('estado','=', "pendente")->where('posto_id','=', $request->posto)->first();
        //bicicletas disponiveis no posto selecionado
       
        //dd($reservascliente);
        $bicla = DB::table('bicicletas')->where('posto_id', '=', $request->posto)->where('estado','=','disponível')->first();
        //dd($bicla);
        //se tiver reserva
        if($reservascliente){//cliente possui reserva
           // dd($reservascliente->hora_reserva);
            $ha=$hora_atual->format('H:i:s');
            $hr=Carbon::parse($reservascliente->hora_reserva)->format('H:i:s');
            if($hr<$ha){
            //if($reservascliente->hora_reserva<$hora_atual){
                $custo = $reservascliente->custo + 1;
                DB::table('reservas')->where('cliente_id',$id)->where('estado','pendente')->update(['estado'=>'ativo', 'custo' => $custo, 'hora_inicial' => Carbon::now()]);
                return redirect('/home')->with('msg','Obrigado por ter reservado. Faça boa viagem');}
            //ainda não chegou à hora da reserva
           else{
            $p=DB::table('posto')->where('id',$request->posto)->first();
                return redirect('/home')->with('msg-error','A sua reserva no posto '.$p->nome.' está marcada para as '.$reservascliente->hora_reserva.'.');
            }
        }
        if(!$reservascliente && $bicla){//se nao existir reserva e tiver bicicleta
            DB::table('bicicletas')->where('id',$bicla->id)->update(['estado'=>'reservado']); //estado da bicicleta atualizado
            //vai utilizar sem reserva
            $reserva = Reserva::create([
                'hora_inicial'=> $hora_atual,
                'custo'=> '1',
                'cliente_id'=> $id,
                'bicicleta_id'=> $bicla->id,
                'posto_id'=> $request->posto,
                'estado'=> 'ativo_semreserva'
            ]);
            $reserva->save();
            return redirect('/home')->with('msg','Faça boa viagem. Lembre-se que pode sempre reservar.');
        }//se não tiver reserva e não houver bicicleta
        if(!$reservascliente && !$bicla){
            return redirect('/home')->with('msg-error','Não existem bicicletas disponíveis no posto selecionado');
        }
        else{
            return redirect('/home')->with('msg-error','ups!');
        }
    }

    public function deliver(){
        $emUtilizacaoComReserva = DB::table('reservas')->where('cliente_id', '=' , Auth::user()->id )->where('estado','=', "ativo")->first();
        $emUtilizacaoSemReserva = DB::table('reservas')->where('cliente_id', '=' , Auth::user()->id )->where('estado','=', "ativo_semreserva")->first();
        if($emUtilizacaoSemReserva || $emUtilizacaoComReserva)
        {
            return view('entrega');
        }
        else{
            return redirect('/utilizacao')->with('msg-error','Não existe uma bicicleta para entregar.');
        }
    }

    public function endusing(Request $request){
        $id = Auth::user()->id;
        $hora_atual = Carbon::now();
        $utilizacao_comreserva = DB::table('reservas')->where('cliente_id', '=' , $id)->where('estado','=', "ativo")->first();
        $utilizacao_semreserva = DB::table('reservas')->where('cliente_id', '=' , $id)->where('estado','=', "ativo_semreserva")->first();
        if($utilizacao_semreserva){
            $totalDurationmin = $hora_atual->diffInMinutes($utilizacao_semreserva->hora_inicial);
            //calcula tempo utilizacao 
            $custo = $utilizacao_semreserva->custo+$totalDurationmin*0.15+0.15;
            //calculo do custo
            //dd($custo);
            $reserva= Reserva::find($utilizacao_semreserva->id);
            $reserva->estado='utilizado_semreserva'; 
            $reserva->custo = $custo;
            $reserva->hora_final = $hora_atual;
            $reserva->save();
            //DB::table('reservas')->where('id','=',$utilizacao_semreserva->id)->where('estado','=','ativo')->update(['estado'=>'utilizado', 'custo' => $custo, 'hora_final' => Carbon::now()]); 
            //termina reserva na bd
            $bicicleta= Bicicleta::find($utilizacao_semreserva->bicicleta_id);
            $bicicleta->estado='disponível';
            $bicicleta->posto_id=$request->posto;
            $bicicleta->save();
            if(Auth::user()->pagamento=="pagamento_cartao"){
            $recibo = new Recibo;
            $recibo->custo = $custo;
            $recibo->utilizacao = "pagamento_cartao";
            $recibo->user_id = Auth::user()->id;
            $recibo->save();   }
            //DB::table('bicicletas')->where('id','=',$utilizacao_semreserva->bicicleta_id)->update(['estado'=>'disponível', 'posto_id' => $request->posto]); 
            //coloca bicicleta disponível no posto
            return redirect('/home')->with('msg','Entregou bicicleta com sucesso. A sua utilização demorou '.($totalDurationmin+1).' minutos e custou-lhe'.$custo.'€');
        }
        if($utilizacao_comreserva){
            $totalDurationmin = $hora_atual->diffInMinutes($utilizacao_comreserva->hora_reserva);
            //calcula tempo utilizacao
            $custo = $utilizacao_comreserva->custo+$totalDurationmin*0.15+0.15;
            //calculo do custo
            //dd($custo);
            $reserva= Reserva::find($utilizacao_comreserva->id);
            $reserva->estado='utilizado'; 
            $reserva->custo = $custo;
            $reserva->hora_final = $hora_atual;
            $reserva->save();
            //DB::table('reservas')->where('id','=',$utilizacao_comreserva->id)->where('estado','=','ativo_semreserva')->update(['estado'=>'utilizado', 'custo' => $custo, 'hora_final' => Carbon::now()]); 
            //terminar reserva na bd
            $bicicleta= Bicicleta::find($utilizacao_comreserva->bicicleta_id);
            $bicicleta->estado='disponível';
            $bicicleta->posto_id=$request->posto;
            $bicicleta->save();
            if(Auth::user()->pagamento=="pagamento_cartao"){
            $recibo = new Recibo;
               $recibo->custo = $custo;
               $recibo->utilizacao = "pagamento_cartao";
               $recibo->user_id = Auth::user()->id;
               $recibo->save();}
            //DB::table('bicicletas')->where('id','=',$utilizacao_comreserva->bicicleta_id)->update(['estado'=>'disponível', 'posto_id' => $request->posto]); 
            //coloca bicicleta disponível no posto
            return redirect('/home')->with('msg','Entregou bicicleta com sucesso. A sua utilização demorou '.($totalDurationmin+1).' minutos e custou-lhe'.$custo.'€');
        }
        else{
            return redirect('/home')->with('msg-error','Entrou nas entregas e nao estava a utilizar nada.');
        }
    }
}