
{{--codigo para el nav y para incluirlo en un div--}}
@extends('layouts.app')
@section('content')
<div class="container">
    
          {{--codigo para recepcionar los mensajes--}}
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">    
                    <span aria-hidden="true">&times;</span>
                </button> no funciona--}} 
            </div>  
        @endif  
    <a href="{{ url('empleado/create')}}" class="btn btn-success">Registrar nuevo empleado</a> {{--Para ir a create--}}
    <br>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>

                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="200" alt="Foto de una nube">
                    {{--{{ $empleado->foto}}--}} 
                </td>

                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellidoPaterno }}</td>
                <td>{{ $empleado->apellidoMaterno }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>
                    {{-- buttonEditar --}}
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a>
                    |
                    {{-- button Borrar --}}                
                    <form action="{{ url('/empleado/'.$empleado->id)}}" class="d-inline" method="POST">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">               
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $empleados->links() !!}
</div>
@endsection