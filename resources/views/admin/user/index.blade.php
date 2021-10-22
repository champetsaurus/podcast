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
        <i class="fas fa-user mr-1"></i>
        Usuarios
      </h3>
    </div>
    <div class="card-body">
      <button type="button" name="button" onclick="location.href='{{route('admin.user.add')}}'" class='form-control'>Agregar</button>
      <div class="row"><div class="col-lg-12">&nbsp;</div></div>
      <div class="row">
        <div class="col-lg-1">&nbsp;</div>
        <div class="col-lg-10">
          <table style="width:100%" id='usuarios'>
            <thead>
              <tr>
                <th style='text-align:center;'>Nombre</th>
                <th style='text-align:center;'>Email</th>
                <th style='text-align:center;'>Tipo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($usuario as $key => $usuario)
                <tr>
                  <td style='text-align:center;'>{{$usuario->name}}</td>
                  <td style='text-align:center;'>{{$usuario->email}}</td>
                  <td style='text-align:center;'>{{$usuario->tipo}}</td>
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
