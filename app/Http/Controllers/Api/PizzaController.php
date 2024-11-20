<?php

namespace App\Http\Controllers\Api;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PizzaController extends Controller
{
    // Mostrar todas las pizzas
    public function index()
    {
        return Pizza::all();  // Retorna todas las pizzas en formato JSON
    }

    // Mostrar una pizza específica por ID
    public function show($id)
    {
        return Pizza::findOrFail($id);  // Retorna la pizza con el ID especificado
    }

    // Crear una nueva pizza
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $pizza = Pizza::create($validated);  // Crea una nueva pizza

        return response()->json($pizza, 201);  // Retorna la pizza creada
    }

    // Actualizar una pizza existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $pizza = Pizza::findOrFail($id);  // Busca la pizza por ID

        $pizza->update($validated);  // Actualiza la pizza

        return response()->json($pizza);  // Retorna la pizza actualizada
    }

    // Eliminar una pizza
    public function destroy($id)
    {
        Pizza::destroy($id);  // Elimina la pizza con el ID especificado

        return response()->json(null, 204);  // Retorna una respuesta sin contenido
    }
}
