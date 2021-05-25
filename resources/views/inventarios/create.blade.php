
@extends('layouts.app')

@section('content')

<div class="container">


Seccion para crear empleados 

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
     <nav class="menu">
              <ul>  
            <li class="scroll"><a href="#mision">Mision</a></li>
            <li class="scroll"><a href="#video">Historia</a></li>
            <li class="scroll"><a href="#vision">Vision</a></li>
            <li class="scroll"><a href="#ingreso">Ingreso</a></li>
            <li class="ecroll"><a href="#opciones">Opcion de registro</a></li>
            <li class="scroll"><a href="#servicio">Servicios</a></li>
            <li class="scroll"><a href="#contacto">Contacto</a></li>
            </ul>
          </nav>

    <form action="{{url('/inventarios')}}" method="post" enctype="multipart/form-data">
    <br>
     
    {{ csrf_field() }}
    
    @include('inventarios.form',['Modo'=>'crear'])
   </form>
   </div>               
@endsection