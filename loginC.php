<?php
// LOGIN LOGIC
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
            if ($rol === 'admin') {
                header("Location: indexA.php");
            } elseif ($rol === 'profesor') {
                header("Location: indexP.php");
            } elseif ($rol === 'estudiante') {
                header("Location: indexE.php");
            }
            exit();
        } else {
            $error_message = "Contraseña incorrecta.";
            echo "<script>alert('$error_message');</script>";
            header("Location: login.php");
        }
    } else {
        $error_message = "Cédula no encontrada.";
        echo "<script>alert('$error_message');</script>";
        header("Location: login.php");
    }

    $stmt->close();
    $conn->close();
}
?>