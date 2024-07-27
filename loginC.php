<?php
session_start(); 

include_once 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT contrasena, rol FROM usuarios WHERE cedula = ?");
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password, $rol);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['cedula'] = $cedula;
            $_SESSION['rol'] = $rol;

            // CAMBIAR PESTAÑAS
            if ($rol === 'administrador') {
                header("Location: admin_dashboard.php");
            } elseif ($rol === 'profesor') {
                header("Location: loginSing.php");
            } elseif ($rol === 'estudiante') {
                header("Location: estudiante_dashboard.php");
            }
            exit();
        } else {
            $error_message = "Contraseña incorrecta.";
        }
    } else {
        $error_message = "Cédula no encontrada.";
    }

    $stmt->close();
    $conn->close();
}
?>