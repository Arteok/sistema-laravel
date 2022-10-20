Sección para crear empleados
<form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data"<!--multipart me deja enviar archivos... en este caso in jpg-->
@csrf    
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    
    <label for="apellidoPaterno">Apellido Paterno:</label>
    <input type="text" name="apellidoPaterno" id="apellidoPaterno">
    <br>

    <label for="apellidoMaterno">Apellido Materno:</label>
    <input type="text" name="apellidoMaterno" id="apellidoMaterno" >
    <br>

    <label for="Correo">Correo:</label>
    <input type="text" name="correo" id="correo">
    <br>

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto">
    <br>

    <input type="submit" value="Guardar">
    <br>
</form>