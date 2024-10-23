<?php
 namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('Suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('Suppliers.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado con éxito.');
    }

    public function edit(Supplier $supplier)
    {
        return view('Suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado con éxito.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado con éxito.');
    }
}
