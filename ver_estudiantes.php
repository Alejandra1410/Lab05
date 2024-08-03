<?php
session_start();
include_once 'config.php';

// Verificar que el usuario sea un profesor
if ($_SESSION['rol'] !== 'profesor') {
    header("Location: login.php");
    exit();
}

$codigo_curso = $_GET['codigo_curso'];

// Obtener el nombre del curso
$stmt = $conn->prepare("SELECT nombre FROM curso WHERE codigo_curso = ?");
$stmt->bind_param("s", $codigo_curso);
$stmt->execute();
$stmt->bind_result($nombre_curso);
$stmt->fetch();
$stmt->close();

// Obtener los estudiantes del curso
$stmt = $conn->prepare("SELECT p.cedula, p.nombre, p.telefono FROM persona p
                        INNER JOIN estudiante_cursos ce ON p.cedula = ce.cedula_estudiante
                        WHERE ce.codigo_curso = ?");
$stmt->bind_param("s", $codigo_curso);
$stmt->execute();
$result = $stmt->get_result();
$estudiantes = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes del Curso</title>
    <link rel="stylesheet" href="css/cursos.css">
    <style>
        /* Puedes añadir estilos adicionales aquí */
    </style>
</head>
<body>
    <div class="container">
        <h1>Estudiantes del Curso: <?= htmlspecialchars($nombre_curso) ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?= htmlspecialchars($estudiante['cedula']) ?></td>
                        <td><?= htmlspecialchars($estudiante['nombre']) ?></td>
                        <td><?= htmlspecialchars($estudiante['telefono']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.history.back()">Volver</button>
    </div>
</body>
</html>
