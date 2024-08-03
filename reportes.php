<?php
session_start();
include_once 'config.php';

if ($_SESSION['rol'] !== 'profesor') {
    header("Location: login.php");
    exit();
}

$cedula_profesor = $_SESSION['cedula'];

$stmt = $conn->prepare("SELECT c.codigo_curso, c.nombre FROM curso c
                        INNER JOIN profesor_cursos cp ON c.codigo_curso = cp.codigo_curso
                        WHERE cp.cedula_profesor = ?");
$stmt->bind_param("s", $cedula_profesor);
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
    <title>Reportes de Estudiantes</title>
    <link rel="stylesheet" href="css/cursos.css">

</head>
<body>
    <div class="container">
        <h1>Reporte de Cursos</h1>
        <ul>
            <?php foreach ($cursos as $curso): ?>
                <li style="background-color: #002b5e;">
                    <a style=" color:white;" href="ver_estudiantes.php?codigo_curso=<?= $curso['codigo_curso'] ?>"><?= $curso['nombre'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <button onclick="window.history.back()">Volver</button>
    </div>
</body>
</html>
