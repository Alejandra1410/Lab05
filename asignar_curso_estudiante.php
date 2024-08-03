<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Curso a Estudiante</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <h1>Asignar Curso a Estudiante</h1>
        <form action="asignar_curso_estudiante_logic.php" method="POST">
            <label for="codigo_curso">Código del Curso:</label>
            <input type="text" id="codigo_curso" name="codigo_curso" required>

            <label for="cedula_estudiante">Cédula del Estudiante:</label>
            <input type="text" id="cedula_estudiante" name="cedula_estudiante" required>

            <button type="submit">Asignar Curso</button>
            <button onclick="history.back()" class="back">Regresar</button>

        </form>
    </div>
</body>
</html>
