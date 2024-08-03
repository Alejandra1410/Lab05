    <?php
    // REGISTER LOGIC
    include_once 'config.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $password = $_POST['password'];
        $rol = $_POST['rol']; 

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $conn->begin_transaction();

        try {
            $stmt = $conn->prepare("INSERT INTO persona (cedula, nombre, telefono) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $cedula, $nombre, $telefono);
            $stmt->execute();

            $stmt = $conn->prepare("INSERT INTO usuarios (cedula, contrasena, rol) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $cedula, $hashed_password, $rol);
            $stmt->execute();

            $conn->commit();

            header("Location: success.html");
        } catch (Exception $e) {
            $conn->rollback();
            echo "Error en el registro: " . $e->getMessage();
        }
    }
    ?>
