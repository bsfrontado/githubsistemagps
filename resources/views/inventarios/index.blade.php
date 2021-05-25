<link href="{{asset('css/style.css')}}" rel="stylesheet">
@extends('layouts.app')

@section('content')
<div class="sidebar">
  <nav class="menu">
              <ul>  
            <li class="#"><a href="#mision">Mision</a></li>
            <li class="#"><a href="#video">Historia</a></li>
            <li class="#"><a href="#vision">Vision</a></li>
            <li class="#"><a href="#ingreso">Ingreso</a></li>
            <li class="#"><a href="#opciones">Opcion de registro</a></li>
            <li class="#"><a href="#servicio">Servicios</a></li>
            <li class="#"><a href="#contacto">Contacto</a></li>
            </ul>
          </nav>
        <div>

<div class="container">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<a href="{{url('inventarios/create')}}" class="btn  btn-success">Agregar Dispositivo</a>
<a href="{{url('inventarios/pdf')}}" target="_blank" class="btn  btn-success">Impresion</a>
<table class="table table-light table-hover">

      
      <thead class="thead-dark">
      <tr>
          <th>#</th>
          <th>modelo</th>
          <th>marca</th>
          <th>serial</th>
          <th>estado</th>
          <th>caracteristicas</th>
          <th>precio_compra</th>
          <th>foto</th>
          </tr>
    </thead>
    <tbody>
    @foreach($inventarios as $inventario)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$inventario->modelo}}</td>
            <td>{{$inventario->marca}}</td>
            <td>{{$inventario->serial}}</td>
            <td>{{$inventario->estado}}</td>
            <td>{{$inventario->caracteristicas}}</td>
            <td>{{$inventario->precio_compra}}</td>
            <td>
            <img src="{{ asset('storage').'/'.$inventario->foto}}" class="img-thumbnail img-fluid" alt="" width="100">
            </td>
            <td>
            <a class="btn btn-warning" href="{{ url('/inventarios/'.$inventario->id.'/edit') }}">
             Editar
            </a>
                        
              <form method="post"  action="{{url('/inventarios/'.$inventario->id)}}" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-danger"type="submit" onclick="return confirm('borrar?')" >borrar</button>
              </form>
             </td>
            </tr>
     @endforeach       
    </tbody>

 </table> 
 {{$inventarios->links()}}
 </div>               
@endsection