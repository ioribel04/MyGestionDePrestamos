
@if($prestamos->count())

<table class="table table-bordered table-hover">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Interés</th>
            <th>Saldo Capital</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>

    </thead>

    <tbody>

    @foreach($prestamos as $prestamo)

        <tr>

            <td>{{ $prestamo->id }}</td>

            <td>
                {{ $prestamo->cliente->nombre }}
                {{ $prestamo->cliente->apellido }}
            </td>

            <td>RD$ {{ number_format($prestamo->monto,2) }}</td>

            <td>{{ $prestamo->interes }} %</td>

            <td>
                RD$ {{ number_format($prestamo->saldo_capital,2) }}
            </td>

            <td>{{ $prestamo->fecha_prestamo }}</td>

            <td>
                @if($prestamo->estado)
                    <span class="badge bg-success">Activo</span>
                @else
                    <span class="badge bg-secondary">Finalizado</span>
                @endif
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@else

<div class="alert alert-info">
    Aún no hay préstamos registrados.
</div>

@endif