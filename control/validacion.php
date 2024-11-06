<?php
// Inicio de sesion para mantener datos //
session_start();
// Cargamos el archivo de los datos //
require "../model/data.php";

$usuarios = USUARIOS;

// Declaracion de datos de sesion recogidos //
$nombre = $_SESSION["nombre"] = $_POST["nombre"] ?? '';
$apellido = $_SESSION["apellido"] = $_POST["apellido"] ?? '';
$dni = $_SESSION["dni"] = $_POST["dni"] ?? '';
$coche = $_SESSION["vehiculo"] = $_POST["vehiculo"] ?? '';
$fecha_ini = $_SESSION["fecha_ini"] = $_POST["fecha_ini"] ?? '';
$dias = $_SESSION["dias"] = $_POST["dias"] ?? '';

// Variables para control de validaciones //
$campos_vacios = false;
$usu_ok = false;
$valida_dni = false;
$valida_fecha = false;
$valida_dias = false;
$coche_disp = false;

// Variables para almacenar en la sesion //
$_SESSION['nom'] = false;
$_SESSION['ape'] = false;
$_SESSION['dni_'] = false;
$_SESSION['usu_ok'] = false;
$_SESSION['valida_dni'] = false;
$_SESSION['valida_fecha'] = false;
$_SESSION['valida_dias'] = false;
$_SESSION['coche_disp'] = false;

// Comprobar datos vacios de nombre apellido y dni //
if (empty($nombre)) {
    $campos_vacios = true;
    $_SESSION['nom'] = false;
    echo "<p style='color:red'>Error: Nombre, apellido y DNI son obligatorios.</p>";
} else if(empty($apellido)){
    $campos_vacios = true;
    $_SESSION['ape'] = false;
} else if(empty($dni)){
    $campos_vacios = true;
    $_SESSION['dni_'] = false;
}
    // Main //
comprobar_usuario($nombre, $apellido);
validar_dni($dni);
comprobar_fecha($fecha_ini);
comprobar_num_dias($dias);
comprobar_coche_disp($coche);

// Comprobar validacion y abrir la página correspondiente //
if(!$campos_vacios && $usu_ok && $valida_dni && $valida_fecha && $valida_dias && $coche_disp){
    echo "Abrir pagina de reserva_ok.php";
    header("location: ../view/reserva_ok.php");
} else {
    echo "Abrir pagina de reserva_no_ok.php";
    header("location: ../view/reserva_no_ok.php");

}

            // FUNCIONES //
// Funcion para buscar el usuario //
function comprobar_usuario($nombre, $apellido){

    global $usuarios;
    global $usu_ok;

    foreach($usuarios as $usuario){

        if(strtoupper($usuario["nombre"]) === strtoupper($nombre) && strtoupper($usuario["apellido"]) === strtoupper($apellido)){
            echo "¡usuario encontrado! ";
            $usu_ok = true;
            $_SESSION['usu_ok'] = true;
        } else {
            echo "usuario no registrado ";
        }

    }

}

// Funcion para validar dni //
function validar_dni($dni){
    global $valida_dni;

    $letra = substr($dni,8,1);
    $dni_sin_letra = (int)substr($dni,0,8);

    $letra_cal = substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($dni_sin_letra,"XYZ","012")%23,1);

    if(strtoupper($letra) === strtoupper($letra_cal)){
        $valida_dni = true;
        $_SESSION['valida_dni'] = true;
        echo $dni." ok ";
    } else {
        echo "introduzca dni correcto ";
    }

}

function comprobar_fecha($fecha_ini) {
    global $valida_fecha;

    // Obtener la fecha actual //
    $fecha_actual = date('d/m/y');

    // Convertir fechas a objetos DateTime para comparar en funcion del formato especifico recogido //
    $fecha_actual_obj = DateTime::createFromFormat('d/m/y', $fecha_actual);
    $fecha_ini_obj = DateTime::createFromFormat('d/m/y', $fecha_ini);

    // Comparar fechas //
    if ($fecha_actual_obj >= $fecha_ini_obj) {
        echo "La fecha es menor o igual.";
    } else {
        $valida_fecha = true;
        $_SESSION['valida_fecha'] = true;
        echo "La fecha está ok.";
    }
}

// Funcion para comprobar num de dias //
function comprobar_num_dias($dias){
    global $valida_dias;

    $dias = (int)$dias; // Parseo de dias a numero entero //

    if($dias >= 1 && $dias <= 30){
        echo " Num dias ok  ";
        $valida_dias = true;
        $_SESSION['valida_dias'] = true;
    }
}

// Funcion para comprobar disponibilidad de coche //
function comprobar_coche_disp($coche){
    
    global $coche_disp;
    global $coches;

    foreach($coches as $vehi){

        if($vehi['modelo'] === $coche){

            echo $vehi['disponible'];
            $coche_disp = $vehi['disponible'];
            $_SESSION['coche_disp'] = $vehi['disponible'];

        } else {
            echo $vehi['disponible'];
        }

    }

}

?>