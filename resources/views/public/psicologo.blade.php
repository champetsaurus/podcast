@extends('layouts.app3')
@section('content')
  <div class="section-heading">
    <h2>Psicólogos</h2>
    <div class="line-dec"></div>
  </div>
  {{-- {{dd($capsulas)}} --}}
  @foreach ($psicologos as $key => $psicologo)
    <div class="left-image-post">
      <div class="row">
        <div class="col-md-6">
          <div class="left-image">
            <img src="{{($psicologo->imagen!=NULL)?asset('image/'.$psicologo->imagen):asset('default.PNG')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-text">
            <h4>{{$psicologo->nombre}}</h4>
            <p>
              {{$psicologo->descripcion}}
            </p>
            <div class="white-button">
              <a href="{{url('/psicologo/detail/'.$psicologo->id)}}">Ver Más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
