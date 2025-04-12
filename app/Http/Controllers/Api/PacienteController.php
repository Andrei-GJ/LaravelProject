<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with(['tipoDocumento', 'genero', 'departamento', 'municipio'])->get();
        return response()->json($pacientes, 200);
    }

    public function show($id)
    {
        $paciente = Paciente::with(['tipoDocumento', 'genero', 'departamento', 'municipio'])->find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
        return response()->json($paciente, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|unique:pacientes',
            'nombre1' => 'required|string',
            'nombre2' => 'nullable|string',
            'apellido1' => 'required|string',
            'apellido2' => 'nullable|string',
            'genero_id' => 'required|exists:generos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'municipio_id' => 'required|exists:municipios,id',
            'correo' => 'required|email|unique:pacientes',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $paciente = Paciente::create($request->all());
        return response()->json(['message' => 'Paciente creado con éxito', 'data' => $paciente], 201);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'tipo_documento_id' => 'exists:tipo_documentos,id',
            'numero_documento' => 'unique:pacientes,numero_documento,' . $paciente->id,
            'nombre1' => 'string',
            'nombre2' => 'nullable|string',
            'apellido1' => 'string',
            'apellido2' => 'nullable|string',
            'genero_id' => 'exists:generos,id',
            'departamento_id' => 'exists:departamentos,id',
            'municipio_id' => 'exists:municipios,id',
            'correo' => 'email|unique:pacientes,correo,' . $paciente->id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $paciente->update($request->all());
        return response()->json(['message' => 'Paciente actualizado con éxito', 'data' => $paciente], 200);
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $paciente->delete();
        return response()->json(['message' => 'Paciente eliminado correctamente'], 200);
    }
}
