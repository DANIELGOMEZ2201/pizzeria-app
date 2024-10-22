<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $clients = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
        ->select('clients.*', 'users.name as user_name')
        ->get();    

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        return view('clients.new', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id); // Obtener el cliente por ID
        $users = DB::table('users')->orderBy('name')->get(); // Obtener usuarios

        return view('clients.edit', ['client' => $client, 'users' => $users]);
    }   

/**
 * Update the specified resource in storage.
 */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $client->user_id = $request->input('user_id');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::find($id); // Obtener el cliente por ID

        if ($client) 
        {
            $client->delete(); // Eliminar el cliente
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado con éxito.');
        }

    return redirect()->route('clients.index')->with('error', 'Cliente no encontrado.'); // Mensaje de error si el cliente no existe
    }
}
