@extends('layouts.app3')
@section('content')
  {{-- {{dd($episodio)}} --}}
  <div class="section-heading">
    <h2>{{$episodio->titulo}}</h2>
    <div class="line-dec"></div>
  </div>

  @if($episodio->link!=NULL)
    {{-- {!!$episodio->link!!} --}}

    {{-- <iframe width="560" height="315" src="http://www.youtube.com/embed/{{$episodio->link}}" frameborder="0" allowfullscreen></iframe> --}}
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$episodio->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  @endif
  <div class="row"><div class="col-lg-12">&nbsp;</div></div>

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
          @if($episodio->psicologo_id!=NULL)
          <div class="white-button">
            <a href="{{url('/psicologo/detail/'.$episodio->psicologo_id)}}">Ver psicólogo</a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row"><div class="col-lg-12">&nbsp;</div></div>

@endsection
