<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the pizza sizes.
     */
    public function index()
    {
        $sizes = PizzaSize::all();
        return response()->json($sizes);
    }

    /**
     * Store a newly created pizza size in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required|string|max:100',
            'price' => 'required|numeric',
        ]);

        $size = PizzaSize::create($request->all());
        return response()->json($size, 201);
    }

    /**
     * Display the specified pizza size.
     */
    public function show($id)
    {
        $size = PizzaSize::find($id);
        
        if (!$size) {
            return response()->json(['message' => 'Size not found'], 404);
        }

        return response()->json($size);
    }

    /**
     * Update the specified pizza size in storage.
     */
    public function update(Request $request, $id)
    {
        $size = PizzaSize::find($id);

        if (!$size) {
            return response()->json(['message' => 'Size not found'], 404);
        }

        $size->update($request->all());
        return response()->json($size);
    }

    /**
     * Remove the specified pizza size from storage.
     */
    public function destroy($id)
    {
        $size = PizzaSize::find($id);

        if (!$size) {
            return response()->json(['message' => 'Size not found'], 404);
        }

        $size->delete();
        return response()->json(['message' => 'Size deleted successfully']);
    }
}
