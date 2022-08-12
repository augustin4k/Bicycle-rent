<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Mockery\Undefined;

class ReservasController extends Controller
{

    public function create()
    {
        $id = Auth::user()->id;
        $reservasAtuais = DB::table('reservas')->where('cliente_id', $id)->where('estado', 'pendente')->paginate(15);
        $postoReserva = DB::table('reservas')->where('cliente_id', $id)->where('estado', 'pendente')->first();
        if($postoReserva != null){
            $posto = DB::table('posto')->where('id',$postoReserva->posto_id)->first();
            return view('create', ['id' => $id , 'reservas' => $reservasAtuais, 'posto' =>  $posto]);
        }
        
        return view('create', ['id' => $id , 'reservas' => $reservasAtuais]);
    }
    public function cancelar(){
        $bicla = DB::table('reservas')->where('cliente_id', Auth::user()->id)->where('estado', 'pendente')->first();
        DB::table('reservas')->where('cliente_id', Auth::user()->id)->where('estado', 'pendente')->delete();
        DB::table('bicicletas')->where('id', $bicla->bicicleta_id)->update(['estado' => 'disponível']);
        
        return redirect('/home')->with('msg','Cancelou a sua reserva com sucesso');
    }

    public function escolheBicla(Request $request){
        $biclaDisponiveis = DB::table('bicicletas')->where('posto_id',$request->posto)->where('estado','disponível');
        $biclaDisponivel = DB::table('bicicletas')->where('posto_id',$request->posto)->where('estado','disponível')->paginate(50);
        //dd($request->horaReserva);
        if($biclaDisponiveis->count() != 0) {
            return view('escolheBicla', ['id' => Auth::user()->id , 'bicicletas' => $biclaDisponivel,'posto' => $request->posto, 'horaReserva' => $request->horaReserva]);
        }
        else{
            return redirect('/home')->with('msg-error','O posto que selecionou não tem bicicletas disponíveis!');
        }

    }

    public function store(Request $request)
    {
        //dd($request->posto);
        $hora_de_reserva = $request->horaReserva;
        $hora_atual = Carbon::now();
        
        if($hora_de_reserva < $hora_atual)
        {
            return redirect('/events/create')->with('msg-error','Hora de reserva introduzida não é válida!');
        }
        $request->validate(
            [
                'horaReserva' => 'required',
                'posto' => 'required'
                
            ]);
    
        $temReserva = DB::table('reservas')->where('estado', 'pendente')->where('cliente_id', Auth::user()->id);
        if($temReserva->count() != 0)
        {
            return redirect('/events/create')->with('msg-error','Apenas pode ter uma reserva ativa!');
        }
        //so pode reservar se n tiver reservas atuais

        //$todas= Bicicleta::all()->where('posto_id', '=', $request->posto)->where('estado','=','disponível');
        //$idRandom = rand($todas[0]->id , $todas[-1]->id);
        //$bicla = DB::table('bicicletas')->where('id',$request->idBicla)->first();
        //dd($bicla);
        DB::table('bicicletas')->where('id',$request->idBicla)->update(['estado'=>'reservado']);

        $reserva = Reserva::create([
            'hora_reserva'=> $request->horaReserva,
            'custo'=> '1',
            'cliente_id'=> Auth::user()->id,
            'bicicleta_id'=> $request->idBicla,
            'posto_id'=> $request->posto,
            'estado'=> 'pendente'
        ]);
        $reserva->save();


        return redirect('/home')->with('msg','Reserva efetuada com sucesso!');
    }
}
