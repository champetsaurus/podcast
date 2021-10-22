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
      <i class="fa fa-photo-video mr-1"></i>
      Media
    </h3>
  </div>
  <div class="card-body">
    <button type="button" name="button" onclick="location.href='{{route('admin.media.add')}}'" class='form-control'>Agregar</button>
    <div class="row"><div class="col-lg-12">&nbsp;</div></div>
    <div class="row">
      <div class="col-lg-1">&nbsp;</div>
      <div class="col-lg-10">
        <table style="width:100%" id='usuarios'>
          <thead>
            <tr>
              <th style='text-align:center;'>Título</th>
              <th style='text-align:center;'>Descripción</th>
              <th style='text-align:center;'>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($capsulas as $key => $capsula)
              <tr>
                <td style='text-align:center;'>{{$capsula->titulo}}</td>
                <td style='text-align:center;'>{{$capsula->descripcion}}</td>
                <td style='text-align:center;'>
                  <i onclick="window.location.href='{{url('/admin/episodio/'.$capsula->id)}}'" title="Episodios" class="fas fa-list cursorSizeIcon"></i>
                  <i onclick="window.location.href='{{url('/admin/media/edit/'.$capsula->id)}}'" title="Modificar" class="fas fa-edit cursorSizeIcon"></i>
                  <i onclick="window.location.href='{{url('/admin/media/delete/'.$capsula->id)}}'" title="Eliminar" class="fas fa-trash cursorSizeIcon"></i>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-lg-1">&nbsp;</div>
    </div>
  </div>
</div>
@endsection
