@extends('layouts.app')

@section('titulo', 'Lista de Pedidos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-secondary">Pedidos Especiales</h2>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-lg shadow">
        + Nuevo Pedido
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Material</th>
                        <th>Cantidad</th>
                        <th>Unidades Med.</th>
                        <th>Cliente</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Fecha Pedido</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $pedido)
                    <tr>
                        <td class="fw-bold">{{ $pedido->material }}</td>
                        <td>{{ $pedido->cantidad }}</td>
                        <td>{{ $pedido->unidadesmed }}</td>
                        <td>{{ $pedido->cliente }}</td>
                        <td>
                            <a href="tel:{{ $pedido->telefono }}" class="text-decoration-none">
                                 {{ $pedido->telefono }}
                            </a>
                        </td>
                        <td>
                            @if($pedido->estado == 'Llegó')
                                <span class="badge bg-success">¡Ya Llegó!</span>
                            @elseif($pedido->estado == 'En camino')
                                <span class="badge bg-warning text-dark">En camino</span>
                            @else
                                <span class="badge bg-secondary">Pedido a prov.</span>
                            @endif
                        </td>
                        <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-sm btn-outline-primary me-1">
                                Editar
                            </a>

                            <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-success" 
                                        onclick="return confirm('¿El pedido ya fue entregado?')">
                                    Entregar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No hay pedidos pendientes.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection