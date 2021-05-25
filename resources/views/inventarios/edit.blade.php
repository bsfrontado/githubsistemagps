@extends('layouts.app')

@section('content')

<div class="container">
Seccion pra editar dispositivos
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

 @include('inventarios.form',['Modo'=>'Actualizar'])

<form action="{{url('/inventarios/ '. $inventario->id)}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PATCH')}}

  
</form>
</div>               
@endsection