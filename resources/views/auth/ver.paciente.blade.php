<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pacientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<p>Rendered at: {{ now() }}</p>
  <div class="container py-5">
    <h2 class="mb-4 text-primary">Pacientes Registrados</h2>
    
    <table class="table table-hover table-bordered" id="tablaPacientes">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Documento</th>
          <th>Nombre Completo</th>
          <th>Género</th>
          <th>Departamento</th>
          <th>Municipio</th>
          <th>Correo</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    <button class="btn btn-danger" onclick="eliminarPaciente(1)">Eliminar</button>
  </div>

  <script>
    function eliminarPaciente(id) {
    if (!confirm("¿Estás seguro de que quieres eliminar este paciente?")) return;

    fetch(`https://proyectolaravel.ddev.site/api/pacientes/${id}`, {
      method: 'DELETE',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        'Accept': 'application/json'
      }
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('No se pudo eliminar el paciente.');
      }
      return response.json();
    })
    .then(data => {
      alert(data.message || 'Paciente eliminado con éxito.');
      // Recargar lista si tenés una
      // cargarPacientes();
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al eliminar el paciente.');
    });
  }
    document.addEventListener('DOMContentLoaded', function () {
        const tablaBody = document.querySelector('#tablaPacientes tbody');

        fetch('https://proyectolaravel.ddev.site/api/pacientes', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3Byb3llY3RvbGFyYXZlbC5kZGV2LnNpdGUvYXBpL2xvZ2luIiwiaWF0IjoxNzQ0NDM4ODM3LCJleHAiOjE3NDQ0NDI0MzcsIm5iZiI6MTc0NDQzODgzNywianRpIjoibmxwUDNCVmdLbEFZYWp2TiIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.ltR5FGAwVC2QS-T2aFO3zsB2KOtkhcxIhRvWJ3KY4Cw'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar los pacientes');
            }
            return response.json();
        })
        .then(data => {
            tablaBody.innerHTML = ''; // Clear existing rows
            data.forEach((p, i) => {
                const fila = `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${p.numero_documento}</td>
                        <td>${p.nombre1} ${p.nombre2 || ''} ${p.apellido1} ${p.apellido2 || ''}</td>
                        <td>${p.genero?.nombre || '-'}</td>
                        <td>${p.departamento?.nombre || '-'}</td>
                        <td>${p.municipio?.nombre || '-'}</td>
                        <td>${p.correo}</td>
                    </tr>
                    <button class="btn btn-danger" onclick="eliminarPaciente(1)">Eliminar</button>
                `;
                tablaBody.innerHTML += fila;
                
            });
        })
        .catch(err => {
            console.error('Error al cargar los pacientes:', err);
            tablaBody.innerHTML = '<tr><td colspan="7" class="text-center text-danger">Error al cargar los pacientes</td></tr>';
        });
    });
</script>
</body>
</html>
