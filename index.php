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
        <h1>Bienvenido a la reserva de vehículos</h1>
    </header>
    <!-- Formulario -->
    <form action="control/validacion.php" method="post">

        <!-- Datos de la persona que reserva -->
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" placeholder="Apellido"><br>
        <label for="dni">DNI</label>
        <input type="text" name="dni" placeholder="xxxxxxxx-x"><br>

        <!-- Desplegable con los datos del array de coches 
            hacer bucle con php para que se genere la lista-->
        <label for="vehiculo">Vehiculo</label>
        <select name="vehiculo" id="vehi">
            <?php
                // generar listado de coches //
                require "model/data.php";

                $html="";
                foreach($coches as $coche){
                    
                    $html .= '<option value="'.$coche["modelo"].'">'.$coche["modelo"].'</option>';
                
                };
                echo $html;
            ?>
        </select><br>

        <!-- Fecha de inicio de la reserva -->
        <label for="fecha_ini">Fecha de inicio de su reserva</label>
        <input type="text" name="fecha_ini" placeholder="dd/mm/aa"><br>
        <!-- Duracion de la reserva en dias -->
        <label for="dias">Nº de días</label>
        <input type="text" name="dias" placeholder="1 - 30 días"><br>
        <!-- Boton para enviar los datos -->
        <input type="submit" value="enviar">


    </form>
</body>
</html>
