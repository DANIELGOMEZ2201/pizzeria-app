<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the raw materials.
     */
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return response()->json($rawMaterials);
    }

    /**
     * Store a newly created raw material in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric',
        ]);

        $rawMaterial = RawMaterial::create($request->all());
        return response()->json($rawMaterial, 201);
    }

    /**
     * Display the specified raw material.
     */
    public function show($id)
    {
        $rawMaterial = RawMaterial::find($id);
        
        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw Material not found'], 404);
        }

        return response()->json($rawMaterial);
    }

    /**
     * Update the specified raw material in storage.
     */
    public function update(Request $request, $id)
    {
        $rawMaterial = RawMaterial::find($id);

        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw Material not found'], 404);
        }

        $rawMaterial->update($request->all());
        return response()->json($rawMaterial);
    }

    /**
     * Remove the specified raw material from storage.
     */
    public function destroy($id)
    {
        $rawMaterial = RawMaterial::find($id);

        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw Material not found'], 404);
        }

        $rawMaterial->delete();
        return response()->json(['message' => 'Raw Material deleted successfully']);
    }
}
