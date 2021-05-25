 
<div class="form-group">

 <label for="Modelo" class="control-label">{{'modelo'}} </label>
    <input type="text" class ="form-control {{$errors->has('modelo')?'is-invalid':''}}" class="form-control" name="modelo" id="modelo" value="{{isset($inventario->modelo)?$inventario->modelo:old('modelo')}}">
       {!! $errors->first('modelo','<div class="invalid-feedback">:message</div>')!!}
      <br>
    <label for="Marca"  class="control-label">{{'marca'}} </label>
    <input type="text" class ="form-control {{$errors->has('marca')?'is-invalid':''}}" class="form-control" name="marca" id="marca" value="{{isset($inventario->marca)?$inventario->marca:old('marca')}}">
     {!! $errors->first('marca','<div class="invalid-feedback">:message</div>')!!}
      <br>
    <label for="Serial"  class="control-label">{{'serial'}} </label>
    <input type="text" class ="form-control {{$errors->has('serial')?'is-invalid':''}}" class="form-control" name="serial" id="serial" value="{{isset($inventario->serial)?$inventario->serial:old('serial')}}">
     {!! $errors->first('serial','<div class="invalid-feedback">:message</div>')!!}
    <br>
    <label for="Estado"  class="control-label">{{'estado'}} </label>
    <input type="text" class ="form-control {{$errors->has('estado')?'is-invalid':''}}" class="form-control" name="estado" id="estado" value="{{isset($inventario->estado)?$inventario->estado:old('estado')}}">
     {!! $errors->first('estado','<div class="invalid-feedback">:message</div>')!!}
    <br>
    <label for="Caracteristicas"  class="control-label">{{'caracteristicas'}} </label>
    <input type="text" class ="form-control {{$errors->has('caracteristicas')?'is-invalid':''}}" class="form-control" name="caracteristicas" id="caracteristicas" value="{{isset($inventario->caracteristicas)?$inventario->caracteristicas:old('caracteristicas')}}">
     {!! $errors->first('caracteristicas','<div class="invalid-feedback">:message</div>')!!}
    <br>
    <label for="Precio_compra"  class="control-label">{{'precio_compra'}} </label>
    <input type="text" class ="form-control {{$errors->has('precio_compra')?'is-invalid':''}}" class="form-control" name="precio_compra" id="precio_compra" value="{{isset($inventario->precio_compra)?$inventario->precio_compra:old('precio_compra')}}">
     {!! $errors->first('precio_compra','<div class="invalid-feedback">:message</div>')!!}
    <br>
    <label for="Foto"  class="control-label">{{'foto'}} </label>
    @if(isset($inventario->foto))
     {!! $errors->first('foto','<div class="invalid-feedback">:message</div>')!!}
    <br>
     <img src="{{ asset('storage').'/'.$inventario->foto}}" alt="" width="150">
    <br>
    @endif
    <input type="file" class ="form-control {{$errors->has('foto')?'is-invalid':''}}" name="foto" id="foto" value="old('foto')">
    <br>
    <input type="submit" class="btn btn-success"value=" {{ $Modo=='crear'?'Agregar':'Actualizar'}}">
    <a class="btn btn-primary" href="{{url('inventarios')}}">Regresar</a>
    </div>
    </form>