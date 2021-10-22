@extends('layouts.app2')

@section('content')
  <div class="card bg-gradient">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="nav-icon far fa-user"></i>
        Psicólogo
      </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{url('/admin/psicologo/update/'.$psicologo->id)}}" name="frmGeneral" id="frmGeneral" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-6">
            <input type="text" value="{{$psicologo->nombre}}" class="form-control form-control-sm" name="nombre" id="nombre" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Descripción</label>
          <div class="col-sm-6">
            <textarea class='form-control' id="descripcion" name="descripcion" rows="8" cols="80" required>{{$psicologo->descripcion}}</textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Teléfono</label>
          <div class="col-sm-6">
            <input type="text" value="{{$psicologo->telefono}}" class="form-control form-control-sm" name="telefono" id="telefono" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Dirección</label>
          <div class="col-sm-6">
            <input type="text" value="{{$psicologo->direccion}}" class="form-control form-control-sm" name="direccion" id="direccion" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-6">
            <input type="email" value="{{$psicologo->email}}" class="form-control form-control-sm" name="email" id="email" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Link externo</label>
          <div class="col-sm-6">
            <input type="text" value="{{$psicologo->link}}" class="form-control form-control-sm" name="link" id="link">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Imagen</label>
          <div class="col-sm-6">
            <img class="img-thumbnail" id="preview" width="110px" height="125px" src="{{(!empty($psicologo->foto))?asset('image/'.$psicologo->foto):asset('image/avatar-default.jpg')}}">

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
