<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Curso</title>
    <link rel="stylesheet" href="css/cursosS.css">
    
    
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="agregarCurso" action="cursos_logic.php" method="POST">
        <h1>Agregar Curso</h1>
        <label for="codigo_curso">Código del Curso:</label>
        <input type="text" id="codigo_curso" name="codigo_curso" required>

        <label for="nombre_curso">Nombre del Curso:</label>
        <input type="text" id="nombre_curso" name="nombre_curso" required>

        <button type="submit">Agregar Curso</button>
        <button onclick="history.back()" class="back">Regresar</button>

    </form>
</body>
</html>
