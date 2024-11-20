<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    // Mostrar todos los empleados
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    // Mostrar un solo empleado
    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee, 200);
    }

    // Crear un nuevo empleado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'role' => 'required|string|in:chef,waiter,manager',
        ]);

        $employee = Employee::create($validated);

        return response()->json($employee, 201); // Empleado creado
    }

    // Actualizar un empleado
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'role' => 'required|string|in:chef,waiter,manager',
        ]);

        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->update($validated);

        return response()->json($employee, 200); // Empleado actualizado
    }

    // Eliminar un empleado
    public function destroy($id)
    {
        $employee = Employee::find($id);
        
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();
        return response()->json(null, 204); // Empleado eliminado
    }
}
