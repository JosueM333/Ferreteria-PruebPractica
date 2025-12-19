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
                
                <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Material</label>
                        <input type="text" name="material" class="form-control" value="{{ $pedido->material }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" value="{{ $pedido->cantidad }}" required>
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
                            <option value="Llegó" {{ $pedido->estado == 'Llegó' ? 'selected' : '' }}>Ya Llegó (Listo para entrega)</option>
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