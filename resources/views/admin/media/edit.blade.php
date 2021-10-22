@extends('layouts.app2')

@section('content')
<div class="card bg-gradient">
  <div class="card-header border-0">
    <h3 class="card-title">
      <i class="fa fa-photo-video mr-1"></i>
      Media
    </h3>
  </div>
  <div class="card-body">
    <form method="post" action="{{url('/admin/media/update/'.$capsula->id)}}" name="frmGeneral" id="frmGeneral" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Título</label>
        <div class="col-sm-6">
          <input type="text" value="{{$capsula->titulo}}" class="form-control form-control-sm" name="titulo" id="titulo" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipo</label>
        <div class="col-sm-6">
          <select class="form-control" name="tipo" id="tipo" required>
            @if($capsula->tipo=='capsula')
              <option value="capsula" selected>Cápsula</option>
              <option value="podcast">Podcast</option>
            @else
              <option value="capsula">Cápsula</option>
              <option value="podcast" selected>Podcast</option>
            @endif
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-6">
          <textarea class='form-control' id="descripcion" name="descripcion" rows="8" cols="80" required>{{$capsula->descripcion}}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-6">
          {{-- {{dd($capsula)}} --}}
          <img class="img-thumbnail" id="preview" width="110px" height="125px" src="{{(!empty($capsula->imagen))?asset('image/'.$capsula->imagen):asset('image/avatar-default.jpg')}}">
          {{-- @if(!empty($capsula->imagen))
          @endif --}}
          <input accept="image/*" class="form-file-input form-control-sm" type="file" name="foto" id="foto">
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
