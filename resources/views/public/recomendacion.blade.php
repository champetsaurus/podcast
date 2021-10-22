@extends('layouts.app3')
@section('content')
  <div class="section-heading">
    <h2>Recomendaciones</h2>
    <div class="line-dec"></div>
  </div>
  {{-- {{dd($capsulas)}} --}}
  @foreach ($extras as $key => $recomendacion)
    <div class="left-image-post">
      <div class="row">
        <div class="col-md-6">
          <div class="left-image">
            <img src="{{($recomendacion->imagen!=NULL)?asset('image/'.$recomendacion->imagen):asset('default.PNG')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-text">
            <h4>{{$recomendacion->titulo}}</h4>
            <p>
              {{$recomendacion->descripcion}}
            </p>
            @if($recomendacion->link!=NULL)
              <div class="white-button">
                <a href="{{$recomendacion->link}}" target="_blank">Ver Link Externo</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
