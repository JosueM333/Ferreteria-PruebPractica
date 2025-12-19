@extends('layouts.app')

@section('titulo', 'Nuevo Pedido')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Anotar Pedido Especial</h4>
            </div>
            <div class="card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
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
                        <input type="text" name="material" class="form-control" placeholder="Ej: Tubo cobre 1/2 pulgada" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Cantidad *</label>
                        <input type="text" name="cantidad" class="form-control" placeholder="Ej: 2 metros / 1 caja" required>
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
                        <label class="form-label fw-bold">Estado *</label>
                        <select name="estado" class="form-select" required>
                            <option value="Pedido a proveedor">Pedido a proveedor</option>
                            <option value="En camino">En camino</option>
                            <option value="Llegó"> Llegó </option>
                            <option value="Entregado">Entregado</option>
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