<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Capsula;
use \App\Models\Episodio;
use \App\Models\Psicologo;
use \App\Models\Extra;

class PublicController extends Controller
{
  public function index(Request $request){
    return view('public.index');
  }

  public function indexCapsula(Request $request){
    $capsulas=Capsula::where('activo',1)->get();
    return view('public.capsula',compact('capsulas'));
  }

  public function detailCapsula(Request $request,$id){
    $episodios=Episodio::where('capsula_id',$id)->where('activo',1)->get();
    $capsula=Capsula::where('id',$id)->first();
    return view('public.episodios',compact('episodios','capsula'));
    // dd($episodios);
  }

  public function detailEpisodio(Request $request,$id){
    $episodio=Episodio::where('id',$id)->first();
    $capsula=Capsula::where('id',$episodio->id)->first();
    return view('public.episodioDetail',compact('episodio','capsula'));
  }

  public function indexPsicologo(Request $request){
    $psicologos=Psicologo::where('activo',1)->get();
    return view('public.psicologo',compact('psicologos'));
  }

  public function detailPsicologo(Request $request,$id){
    $psicologo=Psicologo::where('id',$id)->first();
    return view('public.psicologoDetail',compact('psicologo'));
  }

  public function indexRecomendaciones(Request $request){
    $extras=Extra::where('activo',1)->get();
    return view('public.recomendacion',compact('extras'));
  }
}
