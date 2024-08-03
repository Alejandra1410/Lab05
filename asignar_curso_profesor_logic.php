<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_curso = $_POST['codigo_curso'];
    $cedula_profesor = $_POST['cedula_profesor'];

    $conn->begin_transaction();

    try {
        $stmt = $conn->prepare("INSERT INTO profesor_cursos (codigo_curso, cedula_profesor) VALUES (?, ?)");
        $stmt->bind_param("ss", $codigo_curso, $cedula_profesor);
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
