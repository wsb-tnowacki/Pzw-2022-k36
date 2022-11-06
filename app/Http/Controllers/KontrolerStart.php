<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontrolerStart extends Controller
{
    public function start(){
        return view('start.welcome');
    }
    public function kontakt(){
        return view('start.kontakt');
    }
    public function kontakt_dane($id, $tekst){
        return view('test.kontakt', compact('id','tekst'));
    }
    public function onas(){
        $zadania = [
            'Zadanie 1',
            'Zadanie 2',
            'Zadanie 3'
        ];
        $taski = [
            'Task 1',
            'Task 2',
            'Task 3'
        ];
        $tekster = "teskst testowy";
        //return view('onas',['zadania'=> $zadania]);
        //return view('onas',compact('zadania'));
        //return view('onas')->with('zadania',$zadania);
        //return view('onas',compact('zadania','taski'));
        //return view('onas')->with('zadania',$zadania)->with('taski',$taski);
        return view('start.onas',compact('zadania','tekster'))->with('taski',$taski);
    }
}
