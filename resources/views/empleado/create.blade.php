{{-- Sección para crear empleados --}}
<form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data"<!--Esta enviando la info al store... multipart me deja enviar archivos... en este caso in jpg-->
    @csrf  
    @include('empleado.form') {{-- incluye el codigo de empleado.form --}}             
</form>