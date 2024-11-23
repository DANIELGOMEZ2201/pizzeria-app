<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los clientes con sus usuarios asociados
        $clients = Client::with('user')->get();

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los usuarios, ordenados por nombre
        $users = User::orderBy('name')->get();

        return view('clients.new', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Crear un nuevo cliente usando Eloquent
        Client::create([
            'user_id' => $request->input('user_id'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el cliente por ID con el usuario relacionado
        $client = Client::with('user')->findOrFail($id);

        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener el cliente y los usuarios para el formulario de edición
        $client = Client::findOrFail($id);
        $users = User::orderBy('name')->get();

        return view('clients.edit', ['client' => $client, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el cliente por ID
        $client = Client::findOrFail($id);

        // Validación de los datos recibidos
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Actualizar el cliente
        $client->update([
            'user_id' => $request->input('user_id'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el cliente por ID
        $client = Client::findOrFail($id);

        // Eliminar el cliente
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado con éxito.');
    }
}
