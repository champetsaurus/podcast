@extends('layouts.app3')
@section('content')
  {{-- {{dd($episodio)}} --}}
  <div class="section-heading">
    <h2>{{$psicologo->nombre}}</h2>
    <div class="line-dec"></div>
  </div>

  <div class="row"><div class="col-lg-12">&nbsp;</div></div>

  <div class="left-image-post">
    <div class="row">
      <div class="col-md-6">
        <div class="left-image">
          <img src="{{($psicologo->imagen!=NULL)?asset('image/'.$psicologo->imagen):asset('default.PNG')}}" alt="" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-text">
          <h3>{{$psicologo->nombre}}</h3>
          <h3>{{$psicologo->telefono}}</h3>
          <h3>{{$psicologo->direccion}}</h3>
          <h3>{{$psicologo->email}}</h3>
          <h3>{{$psicologo->link}}</h3>
          <p>
            {{$psicologo->descripcion}}
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row"><div class="col-lg-12">&nbsp;</div></div>

@endsection
