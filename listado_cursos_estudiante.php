<?php
session_start();
include_once 'config.php';

if ($_SESSION['rol'] !== 'estudiante') {
    header("Location: login.php");
    exit();
}

$cedula_estudiante = $_SESSION['cedula'];

$stmt = $conn->prepare("SELECT c.codigo_curso, c.nombre FROM curso c
                        INNER JOIN estudiante_cursos ce ON c.codigo_curso = ce.codigo_curso
                        WHERE ce.cedula_estudiante = ?");
$stmt->bind_param("s", $cedula_estudiante);
$stmt->execute();
$result = $stmt->get_result();
$cursos = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
    <link rel="stylesheet" href="css/cursos.css">
</head>
<body>
    <div class="container">
        <h1>Mis Cursos</h1>
        <ul>
            <?php foreach ($cursos as $curso): ?>
                <li>
                    <?= htmlspecialchars($curso['nombre']) ?> (Código: <?= htmlspecialchars($curso['codigo_curso']) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
        <button onclick="window.history.back()">Volver</button>
    </div>
</body>
</html>
