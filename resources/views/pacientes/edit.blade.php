<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Editar Paciente</h2>
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
            <select class="form-select" name="tipo_documento_id" id="tipo_documento_id" required>
                <option value="1" {{ $paciente->tipo_documento_id == 1 ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                <option value="2" {{ $paciente->tipo_documento_id == 2 ? 'selected' : '' }}>Pasaporte</option>
                <option value="3" {{ $paciente->tipo_documento_id == 3 ? 'selected' : '' }}>Cédula de Extranjería</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="numero_documento" class="form-label">Número de Documento</label>
            <input type="text" class="form-control" name="numero_documento" id="numero_documento" value="{{ $paciente->numero_documento }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre1" class="form-label">Primer Nombre</label>
            <input type="text" class="form-control" name="nombre1" id="nombre1" value="{{ $paciente->nombre1 }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre2" class="form-label">Segundo Nombre</label>
            <input type="text" class="form-control" name="nombre2" id="nombre2" value="{{ $paciente->nombre2 }}">
        </div>

        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" name="apellido1" id="apellido1" value="{{ $paciente->apellido1 }}" required>
        </div>

        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" name="apellido2" id="apellido2" value="{{ $paciente->apellido2 }}">
        </div>

        <div class="mb-3">
            <label for="genero_id" class="form-label">Género</label>
            <select class="form-select" name="genero_id" id="genero_id" required>
                <option value="1" {{ $paciente->genero_id == 1 ? 'selected' : '' }}>Masculino</option>
                <option value="2" {{ $paciente->genero_id == 2 ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select class="form-select" name="departamento_id" id="departamento_id" required>
                <option value="1" {{ $paciente->departamento_id == 1 ? 'selected' : '' }}>Atlántico</option>
                <option value="2" {{ $paciente->departamento_id == 2 ? 'selected' : '' }}>Cundinamarca</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="municipio_id" class="form-label">Municipio</label>
            <select class="form-select" name="municipio_id" id="municipio_id" required>
                <option value="1" {{ $paciente->municipio_id == 1 ? 'selected' : '' }}>Barranquilla</option>
                <option value="2" {{ $paciente->municipio_id == 2 ? 'selected' : '' }}>Bogotá</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo" id="correo" value="{{ $paciente->correo }}" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Actualizar Paciente</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
