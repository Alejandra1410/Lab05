<?php
session_start();
include_once 'config.php';

if (!isset($_SESSION['cedula'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_SESSION['cedula'];
    $new_password = $_POST['new_password'];

    // Encriptar la nueva contraseña
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE usuarios SET contrasena = ?, password_changed = 1 WHERE cedula = ?");
    $stmt->bind_param("ss", $hashed_password, $cedula);
    
    if ($stmt->execute()) {
        switch ($_SESSION['rol']) {
            case 'estudiante':
                header("Location: indexE.php");
                break;
            case 'profesor':
                header("Location: indexP.php");
                break;
            case 'admin':
                header("Location: indexA.php");
                break;
        }
        exit();
    } else {
        echo "Error al actualizar la contraseña";
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="css/cambiar_password.css">
</head>
<body>
    <div class="container">
        <h1>Cambiar Contraseña</h1>
        <form action="cambiar_password.php" method="post">
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" id="new_password" name="new_password" required>
            <button type="submit">Cambiar Contraseña</button>
        </form>
    </div>
</body>
</html>
