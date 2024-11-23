<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    /**
     * Store a newly created pizza ingredient in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient = PizzaIngredient::create($request->all());
        return response()->json($pizzaIngredient, 201);
    }

    /**
     * Remove the specified pizza ingredient from storage.
     */
    public function destroy($pizzaId, $ingredientId)
    {
        $pizzaIngredient = PizzaIngredient::where('pizza_id', $pizzaId)
                                           ->where('ingredient_id', $ingredientId)
                                           ->first();

        if (!$pizzaIngredient) {
            return response()->json(['message' => 'Pizza Ingredient not found'], 404);
        }

        $pizzaIngredient->delete();
        return response()->json(['message' => 'Pizza Ingredient removed successfully']);
    }
}
