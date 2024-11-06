<?php
    session_start();
    // datos de sesion //
    $nombre = $_SESSION["nombre"] ?? 'No especificado';
    $apellido = $_SESSION["apellido"] ?? 'No especificado';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>Su reserva se ha realizado correctamente <?=$nombre?></h1>
    </header>

    <p>Nombre: <?=$nombre?></p> 
    <p>Apellido: <?=$apellido?></p>
    <img src="img\Lancia_Stratos.jpeg" alt="Imagen Lancia Stratos"><br>
    <a href="..\control\session_destroy.php">Volver</a>
    
</body>
</html>









