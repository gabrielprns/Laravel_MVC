<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    
    public function index(Request $request){
        $series = Series::all();
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
      
        return view('series.index')->with("series", $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){

        return view('series.create');
        
    }

    public function store(SeriesFormRequest $request){
        
        $serie = Series::create($request->all());

        for($i =1; $i <= $request->seasonQty; $i++){
            $season = $serie->seasons()->create([
                'number'=> $i,

            ]);

            for($j =1; $j <= $request->EpisodesPerSeason; $j++){
                $season->episodes()->create([
                    'number'=> $j,
    
                ]);
    
            }

        }

        
        

        return redirect()->route('series.index')->with("mensagem.sucesso","Série '{$serie->nome}' adicionada com sucesso");
        

    }

    public function destroy(Series $series,Request $request){

        $series=Series::destroy($series->id);
        

        return redirect()->route('series.index')->with("mensagem.sucesso","Série removida com sucesso");

    }

    public function update(Series $series, SeriesFormRequest $request){

        $series->fill($request->all());
        $series-> save();
        

        return redirect()->route('series.index')->with("mensagem.sucesso","Série '{$series->nome}' atualizada com sucesso");

    }

    public function edit(Series $series){
        return view('series.edit')->with('serie', $series);
    }
      
      
};
?>