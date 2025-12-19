<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::getPedidos();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'material' => 'required',
            'cantidad' => 'required|numeric|min:0.01', 
            'unidadesmed' => 'required', 
            'cliente' => 'required',
            'telefono' => 'required|numeric|min:1',
            'estado' => 'required'
        ]);

        Pedido::createPedido($request);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido registrado correctamente.');
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'material' => 'required',
            'cantidad' => 'required|numeric|min:0.01',
            'unidadesmed' => 'required',
            'cliente' => 'required',
            'telefono' => 'required',
            'estado' => 'required'
        ]);

        Pedido::updatePedido($request, $pedido);

        return redirect()->route('pedidos.index')
            ->with('success', 'Información actualizada.');
    }

    public function destroy(Pedido $pedido)
    {
        Pedido::deletePedido($pedido);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido entregado y eliminado de la lista.');
    }
}