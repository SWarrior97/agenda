<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use Auth;

class eventController extends Controller
{
    public function create(Request $request){
        $user = Auth::user();
        $event = new Event;
        //dd($request);
        $event->nome = $request->name;
        $event->data = $request->data;


        if($request->duration == 'dia_todo'){
            $event->hora_inicio = '00:01';
            $event->hora_fim = '23:59';
        }else{
            $event->hora_inicio = $request->hora_inicio;
            $event->hora_fim = $request->hora_fim;
        }
        
        $event->local = $request->local;
        $event->url = $request->url;
        $event->description = $request->descricao;
        $event->user_id = $user->id;
        $event->save();

        return view('home');
    }

    public function getEventosByUser($id){
        $eventos = Event::where('user_id',$id)->get();
        $eventsReturn = [];

        foreach($eventos as $ev){
            $nome = $ev->nome;
            $data = $ev->data;
            $hora_inicio =$data .'T'.$ev->hora_inicio.':00';
            $hora_fim =$data .'T'. $ev->hora_fim.':00' ;
            $local = $ev->local;
            $url = $ev->url;
            $descricao = $ev->description;

            $event = array('id' => $ev->id, 'title' => $nome, 'description' => $descricao, 'start' => $hora_inicio,'end'=> $hora_fim,'url'=>$url);
            array_push($eventsReturn, $event);
        }

        return $eventsReturn;
    }
}
