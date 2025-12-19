@extends('layouts.app')

@section('titulo', 'Editar Pedido')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Corregir o Actualizar Pedido</h4>
            </div>
            <div class="card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Material</label>
                        <input type="text" name="material" class="form-control" value="{{ $pedido->material }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" value="{{ $pedido->cantidad }}" step="0.01" min="0" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Unidad de Medida</label>
                            <select name="unidadesmed" class="form-select" required>
                                <option value="Unidad(es)" {{ $pedido->unidadesmed == 'Unidad(es)' ? 'selected' : '' }}>Unidad(es)</option>
                                <option value="Metro(s)" {{ $pedido->unidadesmed == 'Metro(s)' ? 'selected' : '' }}>Metro(s)</option>
                                <option value="Centímetro(s)" {{ $pedido->unidadesmed == 'Centímetro(s)' ? 'selected' : '' }}>Centímetro(s)</option>
                                <option value="Milímetro(s)" {{ $pedido->unidadesmed == 'Milímetro(s)' ? 'selected' : '' }}>Milímetro(s)</option>
                                <option value="Kilo(s)" {{ $pedido->unidadesmed == 'Kilo(s)' ? 'selected' : '' }}>Kilo(s)</option>
                                <option value="Libra(s)" {{ $pedido->unidadesmed == 'Libra(s)' ? 'selected' : '' }}>Libra(s)</option>
                                <option value="Litro(s)" {{ $pedido->unidadesmed == 'Litro(s)' ? 'selected' : '' }}>Litro(s)</option>
                                <option value="Galón(es)" {{ $pedido->unidadesmed == 'Galón(es)' ? 'selected' : '' }}>Galón(es)</option>
                                <option value="Caja(s)" {{ $pedido->unidadesmed == 'Caja(s)' ? 'selected' : '' }}>Caja(s)</option>
                                <option value="Juego/Kit" {{ $pedido->unidadesmed == 'Juego/Kit' ? 'selected' : '' }}>Juego/Kit</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cliente</label>
                            <input type="text" name="cliente" class="form-control" value="{{ $pedido->cliente }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="{{ $pedido->telefono }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Estado Actual</label>
                        <select name="estado" class="form-select" required>
                            <option value="Pedido a proveedor" {{ $pedido->estado == 'Pedido a proveedor' ? 'selected' : '' }}>Pedido a proveedor</option>
                            <option value="En camino" {{ $pedido->estado == 'En camino' ? 'selected' : '' }}>En camino</option>
                            <option value="Llegó" {{ $pedido->estado == 'Llegó' ? 'selected' : '' }}>Ya Llegó</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Actualizar Datos</button>
                        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection