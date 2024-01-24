<?php
include("modelo/conexion.php");

$correo = $_POST["txtcorreo"];
$pass     = $_POST["txtpassword"];
$plantel = $_POST["plantel"];//SELECT * FROM usuario usuario INNER JOIN contacto contacto ON usuario.fk_contacto = contacto.id_contacto
session_start();
$buscandousu = mysqli_query($conn, "SELECT * FROM  contacto contacto INNER JOIN usuario usuario ON contacto.fk_usuario = usuario.id_matricula
 WHERE correo = '" . $correo . "' and contraseña = '" . $pass . "' and fk_plantel='" . $plantel . "'");
// SELECT * FROM  usuario usuario INNER JOIN contacto ON usuario.fk_contacto = contacto.id_contacto WHERE correo = '" . $correo . "' and contraseña = '" . $pass . "' and fk_plantel='" . $plantel . "'
$nr = mysqli_fetch_array($buscandousu);

// $nr = mysqli_num_rows($buscandousu);

//[1][4]
$_SESSION['usuario'] = $nr[0]; //este session muestra el id del usuario de la tabla usuarios
print_r($_SESSION['usuario']);
$_SESSION['rol'] = $nr['fk_rol']; //!!!!!!!!!!!!!importante $_SESSION donde muestra el id_rol del usuario que esta ingresando
print_r($_SESSION['rol']);

if ($_SESSION['rol'] == 1) { //admin
    // $_SESSION['usuarioingresando'] = $correo;
    header("Location: tabla_referencias.php");
} else if ($_SESSION['rol'] == 2) { //lector
    // $_SESSION['usuarioingresando'] = $correo;
    header("Location: tabla_referencias.php");
} else {

    echo "<script> alert('Usuario y/o contraseña incorrecto(s)');window.location= 'index.php' </script>";
    session_destroy();
}
// }
// else if ($_SESSION['rol'] == 0) 
