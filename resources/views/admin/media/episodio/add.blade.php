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
    <form method="post" action="{{url('/admin/episodio/post/'.$capsula->id)}}" name="frmGeneral" id="frmGeneral" enctype="multipart/form-data">
      @csrf

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Psicólogo encargado</label>
        <div class="col-sm-6">
          <select class="form-control" name="psicologo" name="psicologo">
            <option value="">Sin Psicólogo</option>
            @foreach ($psicologos as $key => $psicologo)
            <option value="{{$psicologo->id}}">{{$psicologo->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Título</label>
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-sm" name="titulo" id="titulo" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-6">
          <textarea class='form-control' id="descripcion" name="descripcion" rows="8" cols="80" required></textarea>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-6">
          <input accept="image/*" class="form-file-input form-control-sm" type="file" name="foto" id="foto">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Link</label>
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-sm" name="link" id="link" required>
        </div>
      </div>

      <div class="container-fluid text-center">
        <button type="submit" style="background-color: #02103a; color: #ffffff;" class="btn btn-lg btn-primary"><i class="far fa-save"></i> Guardar</button>
      </div>

    </form>
  </div>
</div>
@endsection
