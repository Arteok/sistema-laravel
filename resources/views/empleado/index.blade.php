Inicio(Despliegue de datos)
<a href="{{ url('empleado/create')}}">Registrar nuevo empleado</a> {{--Para ir a create--}}

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>

            <td>
                <img src="{{ asset('storage').'/'.$empleado->foto }}" width="200" alt="Foto de una nube">
                {{--{{ $empleado->foto}}--}} 
            </td>

            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellidoPaterno }}</td>
            <td>{{ $empleado->apellidoMaterno }}</td>
            <td>{{ $empleado->correo }}</td>
            <td>
                {{-- buttonEditar --}}
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
                    Editar
                </a>
                |
                {{-- button Borrar --}}                
                <form action="{{ url('/empleado/'.$empleado->id)}}" method="POST">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">               
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>