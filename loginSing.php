<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro de usuario</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<style>
    
</style>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="register.php" method="post">
        <h3>Registro de usuario</h3>

        <label for="cedula">Cédula</label>
        <input type="text" placeholder="Cédula" id="cedula" name="cedula" required>

        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>

        <label for="telefono">Teléfono</label>
        <input type="text" placeholder="Teléfono" id="telefono" name="telefono" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Contraseña" id="password" name="password" required>

        <label for="rol">Rol</label>
        <select name="rol" id="rol">
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
            <option value="administrador">Administrador</option>
        </select>


        <button type="submit">Registrarse</button>
    </form>
</body>
</html>

