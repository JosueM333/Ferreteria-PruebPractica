<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'material',
        'cantidad',
        'unidadesmed', 
        'cliente',
        'telefono',
        'estado'
    ];

    
    static public function getPedidos()
    {
        return self::all();
    }

    static public function getPedidoById($id)
    {
        return self::find($id);
    }
    
    static public function createPedido(Request $request)
    {
        return self::create($request->all());
    }
    
    static public function updatePedido(Request $request, Pedido $pedido)
    {
        return $pedido->update($request->all());
    }

    static public function deletePedido(Pedido $pedido)
    {
        return $pedido->delete();
    }
}