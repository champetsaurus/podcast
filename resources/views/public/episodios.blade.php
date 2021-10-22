@extends('layouts.app3')
@section('content')
  <div class="section-heading">
    <h2>Episodios de {{$capsula->titulo}}</h2>
    <div class="line-dec"></div>
  </div>
  {{-- {{dd($capsulas)}} --}}
  @foreach ($episodios as $key => $episodio)
    <div class="left-image-post">
      <div class="row">
        <div class="col-md-6">
          <div class="left-image">
            <img src="{{($episodio->imagen!=NULL)?asset('image/'.$episodio->imagen):asset('default.PNG')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-text">
            <h4>{{$episodio->titulo}}</h4>
            <p>
              {{$episodio->descripcion}}
            </p>
            <div class="white-button">
              <a href="{{url('/episodio/detail/'.$episodio->id)}}">Ver Más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row"><div class="col-lg-12">&nbsp;</div></div>
  @endforeach
@endsection
