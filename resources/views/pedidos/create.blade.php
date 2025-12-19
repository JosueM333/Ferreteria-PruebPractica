@extends('layouts.app')

@section('titulo', 'Nuevo Pedido')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Anotar Pedido</h4>
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

                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Material *</label>
                        <input type="text" name="material" class="form-control" placeholder="Ej: Cable eléctrico #12" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Cantidad (Número) *</label>
                            <input type="number" name="cantidad" class="form-control" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Unidad de Medida *</label>
                            <select name="unidadesmed" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <option value="Unidad(es)">Unidad(es)</option>
                                <option value="Metro(s)">Metro(s)</option>
                                <option value="Centímetro(s)">Centímetro(s)</option>
                                <option value="Milímetro(s)">Milímetro(s)</option>
                                <option value="Kilo(s)">Kilo(s)</option>
                                <option value="Libra(s)">Libra(s)</option>
                                <option value="Litro(s)">Litro(s)</option>
                                <option value="Galón(es)">Galón(es)</option>
                                <option value="Caja(s)">Caja(s)</option>
                                <option value="Juego/Kit">Juego/Kit</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre Cliente *</label>
                            <input type="text" name="cliente" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono *</label>
                            <input type="text" name="telefono" class="form-control" placeholder="099..." required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Estado Inicial *</label>
                        <select name="estado" class="form-select" required>
                            <option value="Pedido a proveedor">Pedido a proveedor</option>
                            <option value="En camino">En camino</option>
                            <option value="Llegó">Llegó</option>
                            <option value="Llegó">Entregado</option>

                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection