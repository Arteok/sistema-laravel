 
<h1>{{$modo}} empleados</h1> {{--h1 dinamico--}}
<br>
<label for="nombre">Nombre:</label>
<input type="text" name="nombre"value="{{ isset($empleado->nombre)?$empleado->nombre:'' }}" id="nombre"> {{--al value se le aplica un isset que lo que hace es si EXISTE un VALOR lo pasa y sino pas otro valor distinto--}}
<br>

<label for="apellidoPaterno">Apellido Paterno:</label>
<input type="text" name="apellidoPaterno" value="{{ isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:'' }}" id="apellidoPaterno">
<br>

<label for="apellidoMaterno">Apellido Materno:</label>
<input type="text" name="apellidoMaterno" value="{{ isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:'' }}"  id="apellidoMaterno" >
<br>


<label for="Correo">Correo:</label>
<input type="text" name="correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}" id="correo">
<br>

<label for="foto">Foto:</label>
{{--{{ $empleado->foto }}--}} 
@if (isset($empleado->foto))
        <img src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">    
@endif        

<input type="file" name="foto" value="" id="foto">
<br>
    
<input type="submit" value="{{$modo}} datos">
<br>

<a href="{{ url('empleado')}}">Regresar</a> {{--Para ir al index--}}
 