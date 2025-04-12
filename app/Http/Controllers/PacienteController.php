<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function create()
    {
        return view('registrarPaciente');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|string|max:255',
            'nombre1' => 'required|string|max:255',
            'nombre2' => 'nullable|string|max:255',
            'apellido1' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'genero_id' => 'required|integer',
            'departamento_id' => 'required|integer',
            'municipio_id' => 'required|integer',
            'correo' => 'required|email|max:255',
        ]);

        $paciente = new Paciente();
        $paciente->tipo_documento_id = $validatedData['tipo_documento_id'];
        $paciente->numero_documento = $validatedData['numero_documento'];
        $paciente->nombre1 = $validatedData['nombre1'];
        $paciente->nombre2 = $validatedData['nombre2'] ?? null;
        $paciente->apellido1 = $validatedData['apellido1'];
        $paciente->apellido2 = $validatedData['apellido2'] ?? null;
        $paciente->genero_id = $validatedData['genero_id'];
        $paciente->departamento_id = $validatedData['departamento_id'];
        $paciente->municipio_id = $validatedData['municipio_id'];
        $paciente->correo = $validatedData['correo'];
        $paciente->save();

        return redirect()->route('registrarPaciente.get')->with('success', 'Paciente registrado correctamente');
    }

    public function index()
    {
        if (!auth()->check()) {
            dd('User is not authenticated in index', session()->all(), auth()->user());
        }

        $pacientes = Paciente::all();

        if ($pacientes->isEmpty()) {
            dd('No patients found in the database');
        }

        return view('pacientes.index', compact('pacientes'));
    }

    public function edit(Paciente $paciente)
    {
        if (!$paciente) {
            abort(404, 'Paciente not found');
        }

        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|string|max:255',
            'nombre1' => 'required|string|max:255',
            'nombre2' => 'nullable|string|max:255',
            'apellido1' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'genero_id' => 'required|integer',
            'departamento_id' => 'required|integer',
            'municipio_id' => 'required|integer',
            'correo' => 'required|email|max:255',
        ]);

        $paciente->update($validatedData);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente');
    }

    public function destroy(Paciente $paciente)
    {
        if (!$paciente) {
            abort(404, 'Paciente not found');
        }

        try {
            $paciente->delete();
            return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('pacientes.index')->with('error', 'Error al eliminar el paciente: ' . $e->getMessage());
        }
    }
}
