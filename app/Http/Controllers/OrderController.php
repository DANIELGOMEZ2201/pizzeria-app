<?php
<<<<<<< HEAD

=======
>>>>>>> 61f37ca854a3a667019551167eadba58ce1cdf6e
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    /**
     * Store a newly created order in storage.
     */
=======
    public function index()
    {
        $orders = Order::all();
        return view('Orders.index', compact('orders'));
    }

    public function create()
    {
        return view('Orders.new');
    }

>>>>>>> 61f37ca854a3a667019551167eadba58ce1cdf6e
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
<<<<<<< HEAD
            'status' => 'required|string',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::find($id);
        
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
=======
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
>>>>>>> 61f37ca854a3a667019551167eadba58ce1cdf6e
    }
}
