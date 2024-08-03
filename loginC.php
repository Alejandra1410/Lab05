<?php
session_start();
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];

    // Prepara la consulta SQL para obtener el usuario
    $stmt = $conn->prepare("SELECT cedula, rol, contrasena, password_changed FROM usuarios WHERE cedula = ?");
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    // Verifica si el usuario existe
    if ($user) {
        $_SESSION['cedula'] = $user['cedula'];
        $_SESSION['rol'] = $user['rol'];

        // Verifica si la contraseña ha sido cambiada
        if (!$user['password_changed']) {
            header("Location: cambiar_password.php");
            exit();
        } else {
            // Verifica la contraseña ingresada
            if (password_verify($password, $user['contrasena'])) {
                switch ($user['rol']) {
                    case 'estudiante':
                        header("Location: indexE.php");
                        break;
                    case 'profesor':
                        header("Location: indexP.php");
                        break;
                    case 'admin':
                        header("Location: indexA.php");
                        break;
                    default:
                        echo "Rol no válido";
                        break;
                }
                exit();
            } else {
                $error_message = "Credenciales incorrectas";
                include 'login.php'; // Mostrar el formulario de login con el mensaje de error
            }
        }
    } else {
        $error_message = "Credenciales incorrectas";
        include 'login.php'; // Mostrar el formulario de login con el mensaje de error
    }

    $stmt->close();
}
?>
