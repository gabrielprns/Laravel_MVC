<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use DB;

class SeriesController extends Controller
{
    
    public function index(Request $request){
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
      
        return view('series.index')->with("series", $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){

        return view('series.create');
        
    }

    public function store(Request $request){
        $serie = Serie::create($request->all());
        

        return redirect()->route('series.index')->with("mensagem.sucesso","Série '{$serie->nome}' adicionada com sucesso");
        

    }

    public function destroy(Serie $series,Request $request){

        $series=Serie::destroy($series->id);
        

        return redirect()->route('series.index')->with("mensagem.sucesso","Série removida com sucesso");

    }

    public function edit(Serie $series){
        return view('series.edit')->with('serie', $series);
    }
      
      
};
?>