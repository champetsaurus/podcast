@extends('layouts.app2')

@section('content')
<div class="card bg-gradient">
  <div class="card-header border-0">
    <h3 class="card-title">
      <i class="fa fa-photo-video mr-1"></i>
      Episodios de {{$capsula->titulo}}
    </h3>
  </div>
  <div class="card-body">
    <form method="POST" action="{{url('/admin/episodio/update/'.$episodio->id)}}" name="frmGeneral" id="frmGeneral" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Psicólogo encargado</label>
        <div class="col-sm-6">
          <select class="form-control" id="psicologo" name="psicologo">
            <option value="">Sin Psicólogo</option>
            @foreach ($psicologos as $key => $psicologo)
              @if ($psicologoSelect!=NULL)
                @if ($psicologoSelect->id==$psicologo->id)
                  <option value="{{$psicologo->id}}" selected>{{$psicologo->nombre}}</option>
                @else
                  <option value="{{$psicologo->id}}">{{$psicologo->nombre}}</option>
                @endif
              @else
                <option value="{{$psicologo->id}}">{{$psicologo->nombre}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Título</label>
        <div class="col-sm-6">
          <input type="text" value="{{$episodio->titulo}}" class="form-control form-control-sm" name="titulo" id="titulo" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-6">
          <textarea class='form-control' id="descripcion" name="descripcion" rows="8" cols="80" required>{{$episodio->descripcion}}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-6">
          <img class="img-thumbnail" id="preview" width="110px" height="125px" src="{{(!empty($episodio->imagen))?asset('image/'.$episodio->imagen):asset('image/avatar-default.jpg')}}">

          <input accept="image/*" class="form-file-input form-control-sm" type="file" name="foto" id="foto">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Link</label>
        <div class="col-sm-6">
          <textarea class='form-control' id="link" name="link" rows="8" cols="80" required>{{$episodio->link}}</textarea>

          {{-- <input type="text" value="{{$episodio->link}}" class="form-control form-control-sm" name="link" id="link" required> --}}
        </div>
      </div>

      <div class="container-fluid text-center">
        <button type="submit" style="background-color: #02103a; color: #ffffff;" class="btn btn-lg btn-primary"><i class="far fa-save"></i> Guardar</button>
      </div>

    </form>
  </div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#foto").change(function(){
        readURL(this);
    });
  </script>
@endsection
