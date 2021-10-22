@extends('layouts.app2')
@section('style')
  <style>
    #usuarios {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #usuarios td, #usuarios th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #usuarios tr:nth-child(even){background-color: #f2f2f2;}

    #usuarios tr:hover {background-color: #ddd;}

    #usuarios th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #007bff;
      color: white;
    }
  </style>
@endsection
@section('content')
  <div class="card bg-gradient">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="nav-icon far fa-user"></i>
        Psicólogos
      </h3>
    </div>
    <div class="card-body">
      <button type="button" name="button" onclick="location.href='{{route('admin.psicologo.add')}}'" class='form-control'>Agregar</button>
      <div class="row"><div class="col-lg-12">&nbsp;</div></div>
      @if($psicologos->count()!=0)
        <div class="row">
          <div class="col-lg-1">&nbsp;</div>
          <div class="col-lg-10">
            <table style="width:100%" id='usuarios'>
              <thead>
                <tr>
                  <th style='text-align:center;'>Nombre</th>
                  <th style='text-align:center;'>Descripción</th>
                  <th style='text-align:center;'>Teléfono</th>
                  <th style='text-align:center;'>Dirección</th>
                  <th style='text-align:center;'>Email</th>
                  <th style='text-align:center;'>Link externo</th>
                  <th style='text-align:center;'>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($psicologos as $key => $psicologo)
                  <tr>
                    <td style='text-align:center;'>{{$psicologo->nombre}}</td>
                    <td style='text-align:center;'>{{$psicologo->descripcion}}</td>
                    <td style='text-align:center;'>{{$psicologo->telefono}}</td>
                    <td style='text-align:center;'>{{$psicologo->direccion}}</td>
                    <td style='text-align:center;'>{{$psicologo->email}}</td>
                    <td style='text-align:center;'>{{$psicologo->link}}</td>
                    <td style='text-align:center;'>
                      <i onclick="window.location.href='{{url('/admin/psicologo/edit/'.$psicologo->id)}}'" title="Modificar" class="fas fa-edit cursorSizeIcon"></i>
                      <i onclick="window.location.href='{{url('/admin/psicologo/delete/'.$psicologo->id)}}'" title="Eliminar" class="fas fa-trash cursorSizeIcon"></i>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-lg-1">&nbsp;</div>
        </div>
      @else
        <div class="row"><div class="col-lg-12" style="text-align:center;"><h1>No hay psicólogos aún</h1></div></div>
      @endif
    </div>
  </div>
@endsection
