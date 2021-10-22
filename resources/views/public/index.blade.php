@extends('layouts.app3')
@section('content')
  <div class="section-heading">
    <h2>Acerca de nosotros</h2>
    <div class="line-dec"></div>
    <span style="text-align:center;">Somos un grupo de estudiantes que busca conectar e introducir la formación psicológica a la población estudiantil mediante contenido audiovisual.
Utilizando la experiencia y las habilidades de especialistas en el tema, se hará uso de métodos que buscan dar respuestas generales a las problemáticas de los estudiantes.
</span>
  </div>


  <div class="left-image-post">
    <div class="row">
      {{-- <div class="col-md-6">
        <div class="left-image">
          <img src="{{asset('logo.jpg')}}" alt="" height="500px" width="50px"/>
        </div>
      </div> --}}
      <div class="col-md-12">
        <div class="right-text" style="text-align:center;">
          <h4>Objetivo</h4>
          <p>
            Alcanzar a la mayor parte de la población estudiantil, generando un impacto positivo en la forma en que se desenvuelven en sus actividades académicas; normalizando el tratamiento psicológico.
          </p>
          {{-- <div class="white-button">
            <a href="#">Read More</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
