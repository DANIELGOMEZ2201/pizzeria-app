<?php
namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('Pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        return view('Pizzas.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Pizza::create($request->all());

        return redirect()->route('pizzas.index')->with('success', 'Pizza creada con éxito.');
    }

    public function edit(Pizza $pizza)
    {
        return view('Pizzas.edit', compact('pizza'));
    }

    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza->update($request->all());

        return redirect()->route('pizzas.index')->with('success', 'Pizza actualizada con éxito.');
    }

    public function destroy(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()->route('pizzas.index')->with('success', 'Pizza eliminada con éxito.');
    }
}
