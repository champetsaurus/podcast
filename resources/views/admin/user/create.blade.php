@extends('layouts.app2')

@section('content')
  <div class="card bg-gradient">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="fas fa-user mr-1"></i>
        Usuarios
      </h3>
      <!-- card tools -->
      {{-- <div class="card-tools">
        <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
          <i class="far fa-calendar-alt"></i>
        </button>
        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div> --}}
      <!-- /.card-tools -->
    </div>
    <div class="card-body">
      <form method="post" action="{{route('admin.user.post')}}" name="frmGeneral" id="frmGeneral" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control form-control-sm" name="email" id="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Contraseña</label>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-sm" name="pass" id="pass" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Repita contraseña</label>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-sm" name="repeatPass" id="repeatPass" required>
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
  $("#frmGeneral").submit(function(e){
    e.preventDefault();
    if($('#pass').val()!=$('#repeatPass').val()){
      window.alert("Las contraseñas no coinciden");
    }else {
      e.currentTarget.submit();
    }
  })
  </script>
@endsection
