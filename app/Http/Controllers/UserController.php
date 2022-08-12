<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Recibo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get_username_editing()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $profilePhoto = Auth::user()->profile_photo;
        $id = Auth::user()->id;

        return view('perfil-dados.mudar_username',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'id' => $id
            ]);
    }

    public function get_password_editing()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;

        return view('perfil-dados.mudar_pass',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'id' => $id
            ]);
    }

    public function get_name_editing()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;

        return view('perfil-dados.mudar_nome',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'id' => $id
            ]);
    }

    

    public function account()
   {
       $firstName = Auth::user()->first_name;
       $lastName = Auth::user()->last_name;
       $id = Auth::user()->id;

       return view('perfil',
           [
               'firstName' => $firstName,
               'lastName' => $lastName,
               'id' => $id
           ]);
   }

    public function inicio_sessao()
    {
        return view('inicio_sessao');
    }

    public function welcome()
    {
        return view('welcome');
    }
    public function ajuda()
    {
        $firstName = Auth::user()->first_name;
       $lastName = Auth::user()->last_name;
       $id = Auth::user()->id;

       return view('ajuda',
           [
               'firstName' => $firstName,
               'lastName' => $lastName,
               'id' => $id
           ]);
    }

    public function ticket(Request $request)
    {
        $mensagem = $request->notes;
        $ticket = new Ticket;
        $ticket->notas = $mensagem;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        return redirect('/ajuda')->with('msg','Ticket enviado com sucesso!');
    }
    public function update(Request $request, User $user, Recibo $recibo)
    {
        //USERNAME UPDATE
        if($request->has('old_username', 'new_username'))
        {
            $request->validate(
                [
                    'old_username' => 'required|string|max:255',
                    'new_username' => 'required|string|max:255'
                ]);
            if($request->old_username != Auth::user()->username)
            {
                return redirect('/profile/username-editing')->with('msg-error','Nome de utilizador antigo errado!');
            }
            else
            {
                $user->update(
                    [
                        'username' => $request->new_username
                    ]);

                return redirect('/profile')->with('msg','Nome de utilizador alterado com sucesso!');

            }
        }
        //PASSWORD UPDATE
        if($request->has('old_password', 'new_password'))
        {
            $request->validate(
                [
                    'old_password' => 'required',
                    'new_password'=> 'required',
                ]);
            if(!password_verify($request->old_password,Auth::user()->password))
            {
                return redirect('/profile/password-editing')->with('msg-error','Palavra-chave antiga errada!');
            }

            $user->update(
                [
                    'password' => Hash::make($request->new_password)
                ]);

            return redirect('/profile')->with('msg','Palavra-chave alterada com sucesso!');
        }
        //NAME UPDATE
        if($request->has('new_first_name', 'new_last_name'))
        {
            $request->validate(
                [
                    'new_first_name' => 'required|string|max:255',
                    'new_last_name' => 'required|string|max:255',
                ]);

            $user->update(
                    [
                        'first_name' => $request->new_first_name,
                        'last_name' => $request->new_last_name,
                    ]);

            return redirect('/profile')->with('msg','Nome de próprio alterado com sucesso!');
        }
        //MUDANÇA DE PAGAMENTO
        if($request->has('mudar'))
        {
            if ($user->pagamento == "pagamento_anual")
            {
                $user->update(
                    [
                        'pagamento' => "pagamento_cartao",
                    ]);
            }
            else
            {
                $user->update(
                    [
                        'pagamento' => "pagamento_anual",
                    ]);

               $recibo = new Recibo;
               $recibo->custo = "100.00";
               $recibo->utilizacao = "plano_anual";
               $recibo->user_id = Auth::user()->id;
               $recibo->save();
            }

            return redirect('/profile')->with('msg','Plano de pagamento alterado com sucesso!');
        }
    }
    public function mudar_plano()
    {
        $firstName = Auth::user()->first_name;
        $lastName = Auth::user()->last_name;
        $id = Auth::user()->id;
        $pagamento = Auth::user()->pagamento;
        $pagamentoView = "";

        if ($pagamento == "pagamento_anual")
        {
            $pagamentoView = "Plano de Pagamento Anual";
        } else
        {
            $pagamentoView = "Plano de Pagamento Automático com Cartão";
        }

        return view('perfil-dados.mudança',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'pagamento' => $pagamento,
                'pagamentoView' => $pagamentoView,
                'id' => $id
            ]);
    }

}
