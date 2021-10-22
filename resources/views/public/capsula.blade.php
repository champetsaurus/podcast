@extends('layouts.app3')
@section('content')
  <div class="section-heading">
    <h2>Cápsulas</h2>
    <div class="line-dec"></div>
  </div>
  {{-- {{dd($capsulas)}} --}}
  @foreach ($capsulas as $key => $capsula)
    <div class="left-image-post">
      <div class="row">
        <div class="col-md-6">
          <div class="left-image">
            <img src="{{($capsula->imagen!=NULL)?asset('image/'.$capsula->imagen):asset('default.PNG')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-text">
            <h4>{{$capsula->titulo}}</h4>
            <p>
              {{$capsula->descripcion}}
            </p>
            <div class="white-button">
              <a href="{{url('/capsula/detail/'.$capsula->id)}}">Ver Más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
