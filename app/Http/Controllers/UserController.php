<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'password', 'role')->get();

        return view('users.index', ['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:cliente,empleado',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
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
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'usuario no encontrado.');
        }

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', 
            'role' => 'required|in:cliente,empleado',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
       
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->role = $request->role;
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);    
        
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
