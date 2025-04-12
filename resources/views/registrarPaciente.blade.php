<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Paciente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<p>Rendered at: {{ now() }}</p>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registrar Paciente</h4>
                </div>
                <div class="card-body">

                    {{-- Mensaje de éxito --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif

                    {{-- Errores de validación --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulario --}}
                    <form action="{{ route('registrarPaciente.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
                            <select class="form-select" name="tipo_documento_id" id="tipo_documento_id" required>
                                <option value="" selected disabled>Seleccione el tipo de documento</option>
                                <option value="1">Cédula de Ciudadanía</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Cédula de Extranjería</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="text" class="form-control" name="numero_documento" id="numero_documento" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre1" class="form-label">Primer Nombre</label>
                            <input type="text" class="form-control" name="nombre1" id="nombre1" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre2" class="form-label">Segundo Nombre</label>
                            <input type="text" class="form-control" name="nombre2" id="nombre2">
                        </div>

                        <div class="mb-3">
                            <label for="apellido1" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" name="apellido1" id="apellido1" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido2" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" name="apellido2" id="apellido2">
                        </div>

                        <div class="mb-3">
                            <label for="genero_id" class="form-label">Género</label>
                            <select class="form-select" name="genero_id" id="genero_id" required>
                                <option value="" selected disabled>Seleccione el género</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="departamento_id" class="form-label">Departamento</label>
                            <select class="form-select" name="departamento_id" id="departamento_id" required>
                                <option value="" selected disabled>Seleccione el departamento</option>
                                <option value="1">Atlántico</option>
                                <option value="2">Cundinamarca</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="municipio_id" class="form-label">Municipio</label>
                            <select class="form-select" name="municipio_id" id="municipio_id" required>
                                <option value="" selected disabled>Seleccione el municipio</option>
                                <option value="1">Barranquilla</option>
                                <option value="2">Bogotá</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" id="correo" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Registrar Paciente</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Bootstrap JS + Popper --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
