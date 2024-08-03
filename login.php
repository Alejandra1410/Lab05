<!-- LOGIN -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio de sesión</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="loginC.php" method="post">
        <h3>Inicio de sesión</h3>

        <label for="cedula">Cédula</label>
        <input type="text" placeholder="Cédula" id="cedula" name="cedula" required>

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Contraseña" id="password" name="password" required>

        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>