<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::table('employees')
        ->join('employees', 'employees.user_id', '=', 'users.id')
        ->select('employees.*', 'users.name as user_name', 'users.email' , 'users.id')
        ->get();    

        return view('employees.index', ['employees' => $employees]);

        $employees = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id') // Cambié 'clients.user_id' a 'employees.user_id'
        ->select('employees.*', 'users.name as user_name', 'users.email', 'users.id')
        ->get();    

    return view('employees.index', ['employees' => $employees]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
