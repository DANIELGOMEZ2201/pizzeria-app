<?php

namespace App\Http\Controllers;

use App\Models\ExtraOrder;
use Illuminate\Http\Request;

class ExtraOrderController extends Controller
{
    /**
     * Store a newly created extra order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $extraOrder = ExtraOrder::create($request->all());
        return response()->json($extraOrder, 201);
    }

    /**
     * Remove the specified extra order from storage.
     */
    public function destroy($id)
    {
        $extraOrder = ExtraOrder::find($id);

        if (!$extraOrder) {
            return response()->json(['message' => 'Extra Order not found'], 404);
        }

        $extraOrder->delete();
        return response()->json(['message' => 'Extra Order deleted successfully']);
    }
}
