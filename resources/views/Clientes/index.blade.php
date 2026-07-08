@extends('layouts.app')

@section('contenido')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('clientes.index') }}" method="GET" class="row mb-3">

    <div class="col-md-4">
        <input
            type="text"
            name="buscar"
            class="form-control"
            placeholder="Buscar por nombre, apellido o cédula..."
            value="{{ $buscar }}">
    </div>

    <div class="col-md-auto">
        <button type="submit" class="btn btn-primary">
            Buscar
        </button>

        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
            Limpiar
        </a>
    </div>

</form>
        <h2>Clientes</h2>

        <a href="{{ route('clientes.create') }}" class="btn btn-primary">
            + Nuevo Cliente
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th width="180">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @forelse($clientes as $cliente)

            <tr>

                <td>{{ $cliente->id }}</td>

                <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>

                <td>{{ $cliente->cedula }}</td>

                <td>{{ $cliente->telefono }}</td>

                <td>
                    @if($cliente->estado)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>

                <td>

                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Deseas eliminar este cliente?')">
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center">
                    No hay clientes registrados.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

    {{ $clientes->links() }}

</div>

@endsection