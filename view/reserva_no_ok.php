<?php
    session_start();
    // datos de sesion //
    $nombre = $_SESSION["nombre"];
    $nom = $_SESSION['nom'];
    $ape = $_SESSION['ape'];
    $dni = $_SESSION['dni_'];
    $usu_ok = $_SESSION['usu_ok'];
    $valida_dni = $_SESSION['valida_dni'];
    $valida_fecha = $_SESSION['valida_fecha'];
    $valida_dias = $_SESSION['valida_dias'];
    $coche_disp = $_SESSION['coche_disp'];
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
        <h1>Revise los datos <?=$nombre?></h1>
    </header>
    <p style = "<?= $nom || $usu_ok ? 'color:green' : 'color:red' ?>">Nombre</p>
    <p style = "<?= $ape || $usu_ok ? 'color:green' : 'color:red' ?>">Apellido</p>
    <p style = "<?= $dni || $valida_dni ? 'color:green' : 'color:red' ?>">Dni</p>
    <p style = "<?= $valida_fecha ? 'color:green' : 'color:red' ?>">Fecha de inicio de reserva</p>
    <p style = "<?= $valida_dias ? 'color:green' : 'color:red' ?>">Numero de días</p>
    <p style = "<?= $coche_disp ? 'color:green' : 'color:red' ?>">Coche disponible</p>
    <a href="..\index.php">volver</a>
    
</body>
</html>