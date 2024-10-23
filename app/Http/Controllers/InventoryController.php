<?php
namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return view('Inventory.index', compact('rawMaterials'));
    }

    public function create()
    {
        return view('Inventory.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric',
        ]);

        RawMaterial::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Materia prima añadida con éxito.');
    }

    public function edit(RawMaterial $rawMaterial)
    {
        return view('Inventory.edit', compact('rawMaterial'));
    }

    public function update(Request $request, RawMaterial $rawMaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric',
        ]);

        $rawMaterial->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Inventario actualizado con éxito.');
    }

    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();

        return redirect()->route('inventory.index')->with('success', 'Materia prima eliminada con éxito.');
    }
}
