<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    /**
     * Store a newly created extra ingredient in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'extra_price' => 'required|numeric',
        ]);

        $extraIngredient = ExtraIngredient::create($request->all());
        return response()->json($extraIngredient, 201);
    }

    /**
     * Remove the specified extra ingredient from storage.
     */
    public function destroy($id)
    {
        $extraIngredient = ExtraIngredient::find($id);

        if (!$extraIngredient) {
            return response()->json(['message' => 'Extra Ingredient not found'], 404);
        }

        $extraIngredient->delete();
        return response()->json(['message' => 'Extra Ingredient deleted successfully']);
    }
}
