<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the ingredients.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }

    /**
     * Store a newly created ingredient in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $ingredient = Ingredient::create($request->all());
        return response()->json($ingredient, 201);
    }

    /**
     * Display the specified ingredient.
     */
    public function show($id)
    {
        $ingredient = Ingredient::find($id);
        
        if (!$ingredient) {
            return response()->json(['message' => 'Ingredient not found'], 404);
        }

        return response()->json($ingredient);
    }

    /**
     * Update the specified ingredient in storage.
     */
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);

        if (!$ingredient) {
            return response()->json(['message' => 'Ingredient not found'], 404);
        }

        $ingredient->update($request->all());
        return response()->json($ingredient);
    }

    /**
     * Remove the specified ingredient from storage.
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);

        if (!$ingredient) {
            return response()->json(['message' => 'Ingredient not found'], 404);
        }

        $ingredient->delete();
        return response()->json(['message' => 'Ingredient deleted successfully']);
    }
}
