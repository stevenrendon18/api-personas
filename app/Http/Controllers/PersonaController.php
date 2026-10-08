<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|email|unique:personas,email',
            'telefono' => 'nullable|string|max:20',
        ]);

        $persona = Persona::create($validatedData);

        return response()->json([
            'mensaje' => 'Persona registrada exitosamente',
            'data' => $persona
        ], 201);
    }
}