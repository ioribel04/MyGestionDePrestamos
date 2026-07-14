@extends('layouts.app')

@section('contenido')

<div class="container">

    <h2 class="mb-4">Nuevo Préstamo</h2>

    <form action="{{ route('prestamos.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Cliente</label>

                <select name="cliente_id" class="form-select" required>

                    <option value="">Seleccione un cliente</option>

                    @foreach($clientes as $cliente)

                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre }} {{ $cliente->apellido }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-6 mb-3">
                <label>Monto Prestado</label>

                <input
                    type="number"
                    step="0.01"
                    name="monto"
                    class="form-control"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Interés Mensual (%)</label>

                <input
                    type="number"
                    step="0.01"
                    name="interes"
                    class="form-control"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Fecha del Préstamo</label>

                <input
                    type="date"
                    name="fecha_prestamo"
                    class="form-control"
                    value="{{ date('Y-m-d') }}"
                    required>
            </div>

            <div class="col-md-12 mb-3">

                <label>Observaciones</label>

                <textarea
                    name="observaciones"
                    class="form-control"
                    rows="4"></textarea>

            </div>

        </div>

        <button class="btn btn-success">
            Guardar Préstamo
        </button>

        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

@endsection