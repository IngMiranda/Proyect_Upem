<?php
session_start();
include ("modelo/conexion.php");

$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];
$plantel=$_POST["plantel"];
$buscandoplantel=mysqli_query($conn,"SELECT * FROM plantel WHERE id_plantel = '".$plantel."'");
$buscandousu = mysqli_query($conn,"SELECT * FROM contacto WHERE correo = '".$correo."' and contraseña = '".$pass."'");
$nr = mysqli_num_rows($buscandousu);
$nr = mysqli_num_rows($buscandoplantel);
if($nr == 1)
{
$_SESSION['usuarioingresando']=$correo;
$_SESSION['usuarioingresando']=$pass;
$_SESSION['usuarioingresando']=$plantel;
header("Location: tabla_referencias.php");
}
else if ($nr == 0) 
{
echo "<script> alert('Usuario no existe');window.location= 'index.php' </script>";
}


?>