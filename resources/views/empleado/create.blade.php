{{--codigo para el nav y para incluirlo en un div--}}
@extends('layouts.app')
@section('content')
<div class="container">
    {{-- Sección para crear empleados --}}
    <form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data">{{--Esta enviando la info al store... multipart me deja enviar archivos... en este caso in jpg--}}
        @csrf  
        @include('empleado.form',['modo'=>'Crear']) {{-- incluye el codigo de empleado.form --}}             
    </form>
</div>
@endsection