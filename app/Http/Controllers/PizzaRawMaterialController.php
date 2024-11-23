<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    /**
     * Store a newly created pizza raw material in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $pizzaRawMaterial = PizzaRawMaterial::create($request->all());
        return response()->json($pizzaRawMaterial, 201);
    }

    /**
     * Remove the specified pizza raw material from storage.
     */
    public function destroy($pizzaId, $rawMaterialId)
    {
        $pizzaRawMaterial = PizzaRawMaterial::where('pizza_id', $pizzaId)
                                             ->where('raw_material_id', $rawMaterialId)
                                             ->first();

        if (!$pizzaRawMaterial) {
            return response()->json(['message' => 'Pizza Raw Material not found'], 404);
        }

        $pizzaRawMaterial->delete();
        return response()->json(['message' => 'Pizza Raw Material removed successfully']);
    }
}
