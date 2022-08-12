<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reserva;
use App\Models\Recibo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $current_time = new DateTime('now');
        $current_date = $current_time->format('Y-m-d');
        $current_hours = $current_time->format('H:i:s');
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;

        //$events = Event::all()->where('users_id', '=', $id);

        //$sortedEventsTime = $events->sortBy('beginning_hour');

        return view('home',
            [
            //'events' => $sortedEventsTime,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'id' => $id
            ]
        );
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $current_time = new DateTime('now');
        $current_date = $current_time->format('Y-m-d');
        $current_hour = $current_time->format('H:i:s');
        $date = $request->date;
        $beginning_hour = $request->beginning_hour;

        if($date < $current_date)
        {
            return redirect('/events/create')->with('msg-error','Data introduzida não é válida!');
        }

        $event = new Event;
        $event->users_id = Auth::user()->id;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->beginning_hour = $request->beginning_hour;
        $event->ending_hour = $request->ending_hour;
        $event->notes = $request->notes;
        $event->save();

        return redirect('/home')->with('msg','Agendamento feito com sucesso!');
    }
    public function history()
    {
        $current_time = new DateTime('now');
        $current_date = $current_time->format('Y-m-d');

        DB::enableQueryLog();
        $userHistory = Recibo::all()->where('user_id', '=' , Auth::user()->id)->toArray();
        return view('recibos',
            [
                'userEvents' => $userHistory
            ]
        );
    }
    public function schedule()
    {
        $current_time = new DateTime('now');
        $current_date = $current_time->format('Y-m-d');
        $current_hours = $current_time->format('H:i:s');
        DB::enableQueryLog();
        $userEvents = Reserva::all()->where('cliente_id', '=' ,Auth::user()->id)->where('estado', '=' ,'utilizado')->toArray();

        return view('schedule',
            [
                'userEvents' => $userEvents
            ]
        );
    }

    

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Event::findOrFail($id)->delete();

        return redirect('/events')->with('msg','Agendamento eliminado com sucesso!');
    }

    public function destroy_history(Request $request)
    {
        $id = $request->input('id');
        Event::findOrFail($id)->delete();

        return redirect('/history')->with('msg','Agendamento eliminado com sucesso!');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');

        $event = Event::findOrFail($id);

        return view('/events.edit',['event' => $event]);
    }

    public function update(Request $request)
    {
        Event::findOrFail($request->id)->update($request->all());

        return redirect('/events')->with('msg','Agendamento editado com sucesso!');
    }

    public function avenidaMar()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.avenidaMar',[
                'firstName' => $firstName,
                'lastName' => $lastName,
                'id' => $id
            ]);
    }

    public function edificio2000()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.edificio2000',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function avenidaMadalenas()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.avenidaMadalenas',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function tecnopolo()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.tecnopolo',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function mercado()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.mercado',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function forum()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.forum',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function madeira()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.madeira',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function marina()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.marina',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function miradouro()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.miradouro',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }

    public function monte()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        return view('home.monte',[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'id' => $id
        ]);
    }
}
