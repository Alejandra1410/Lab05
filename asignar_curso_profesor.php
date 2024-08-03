<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Curso a Profesor</title>
    <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <h1>Asignar Curso a Profesor</h1>
        <form action="asignar_curso_profesor_logic.php" method="POST">
            <label for="codigo_curso">Código del Curso:</label>
            <input type="text" id="codigo_curso" name="codigo_curso" required>

            <label for="cedula_profesor">Cédula del Profesor:</label>
            <input type="text" id="cedula_profesor" name="cedula_profesor" required>

            <button type="submit">Asignar Curso</button>
            <button onclick="history.back()" class="back">Regresar</button>

        </form>
    </div>
</body>
</html>
