 
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $empleado->nombre }}" id="nombre">
        <br>
        
        <label for="apellidoPaterno">Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" value="{{ $empleado->apellidoPaterno }}" id="apellidoPaterno">
        <br>
    
        <label for="apellidoMaterno">Apellido Materno:</label>
        <input type="text" name="apellidoMaterno" value="{{ $empleado->apellidoMaterno }}" id="apellidoMaterno" >
        <br>
    
        <label for="Correo">Correo:</label>
        <input type="text" name="correo" value="{{ $empleado->correo }}"  id="correo">
        <br>
    
        <label for="foto">Foto:</label>
        {{ $empleado->foto }}
        <input type="file" name="foto" value=""  id="foto">
        <br>
    
        <input type="submit" value="Guardar">
        <br>
 