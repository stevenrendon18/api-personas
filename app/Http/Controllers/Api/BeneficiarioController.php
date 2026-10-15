<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    // Listar todos los beneficiarios registrados
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Beneficiario::all()
        ], 200);
    }

    // Registrar un nuevo beneficiario (/api/registro-beneficiarios)
    public function store(Request $request)
    {
        // Validaciones según los requerimientos solicitados
        $validated = $request->validate([
            'programa_social' => 'required|string|max:100',
            'comunidad'       => 'nullable|string|max:80',
        ]);

        // Crear el registro en la base de datos
        $beneficiario = Beneficiario::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Beneficiario registrado exitosamente',
            'data'    => $beneficiario
        ], 201);
    }
}