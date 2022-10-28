 
<h1>{{$modo}} empleados</h1> {{--h1 dinamico--}}
<br>
<div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre"value="{{ isset($empleado->nombre)?$empleado->nombre:'' }}" id="nombre"> {{--al value se le aplica un isset que lo que hace es si EXISTE un VALOR lo pasa y sino pas otro valor distinto--}}
        <br>
</div>

<div class="form-group">
        <label for="apellidoPaterno">Apellido Paterno:</label>
        <input type="text" class="form-control" name="apellidoPaterno" value="{{ isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:'' }}" id="apellidoPaterno">
        <br>
</div>

<div class="form-group">
        <label for="apellidoMaterno">Apellido Materno:</label>
        <input type="text" class="form-control" name="apellidoMaterno" value="{{ isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:'' }}"  id="apellidoMaterno" >
        <br>
</div>

<div class="form-group">
        <label for="Correo">Correo:</label>
        <input type="text" class="form-control" name="correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}" id="correo">
        <br>
</div>

<div class="form-group">
        <label for="foto">Foto:</label>
        {{--{{ $empleado->foto }}--}} 
        @if (isset($empleado->foto))
                <img src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">    
        @endif   
        <input type="file"  class="form-control" name="foto" value="" id="foto">
        <br>
</div>

    
<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{ url('empleado')}}">Regresar</a> {{--Para ir al index--}}
 