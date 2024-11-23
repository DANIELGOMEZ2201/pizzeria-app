<?php



namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the pizzas.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return response()->json($pizzas);
    }

    /**
     * Store a newly created pizza in storage.
     */
=======
    public function index()
    {
        $pizzas = Pizza::all();
        return view('Pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        return view('Pizzas.new');
    }

>>>>>>> 61f37ca854a3a667019551167eadba58ce1cdf6e
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
<<<<<<< HEAD
            'price' => 'required|numeric',
        ]);

        $pizza = Pizza::create($request->all());

        return response()->json($pizza, 201);
    }

    /**
     * Display the specified pizza.
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);
        
        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        return response()->json($pizza);
    }

    /**
     * Update the specified pizza in storage.
     */
    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $pizza->update($request->all());
        return response()->json($pizza);
    }

    /**
     * Remove the specified pizza from storage.
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $pizza->delete();
        return response()->json(['message' => 'Pizza deleted successfully']);
=======
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
>>>>>>> 61f37ca854a3a667019551167eadba58ce1cdf6e
    }
}
