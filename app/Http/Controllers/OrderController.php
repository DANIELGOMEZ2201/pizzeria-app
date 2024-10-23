<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('Orders.index', compact('orders'));
    }

    public function create()
    {
        return view('Orders.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Pedido creado con éxito.');
    }

    public function edit(Order $order)
    {
        return view('Orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado con éxito.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pedido eliminado con éxito.');
    }
}
