<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_curso = $_POST['codigo_curso'];
    $nombre_curso = $_POST['nombre_curso'];

    $stmt = $conn->prepare("SELECT * FROM curso WHERE codigo_curso = ?");
    $stmt->bind_param("s", $codigo_curso);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El curso ya existe.";
    } else {
        $stmt = $conn->prepare("INSERT INTO curso (codigo_curso, nombre) VALUES (?, ?)");
        $stmt->bind_param("ss", $codigo_curso, $nombre_curso);
        $stmt->execute();
        
        header("Location: success.html");
    }

    $stmt->close();
    $conn->close();
}
?>