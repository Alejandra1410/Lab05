<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_curso = $_POST['codigo_curso'];
    $cedula_estudiante = $_POST['cedula_estudiante'];

    $conn->begin_transaction();

    try {
        $stmt = $conn->prepare("INSERT INTO estudiante_cursos (codigo_curso, cedula_estudiante) VALUES (?, ?)");
        $stmt->bind_param("ss", $codigo_curso, $cedula_estudiante);
        $stmt->execute();

        $conn->commit();

        header("Location: success.html");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error al asignar el curso: " . $e->getMessage();
    }
}

$conn->close();
?>
