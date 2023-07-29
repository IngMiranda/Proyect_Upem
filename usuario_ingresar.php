<?php
session_start();
include ("modelo/conexion.php");

$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];
$plantel=$_POST["plantel"];
$buscandousu = mysqli_query($conn,"SELECT * FROM contacto WHERE correo = '".$correo."' and contraseña = '".$pass."' and fk_plantel='".$plantel."'");
$nr = mysqli_num_rows($buscandousu);
if($nr == 1)
{
$_SESSION['usuarioingresando']=$correo;

header("Location: tabla_referencias.php");
}
else if ($nr == 0) 
{
echo "<script> alert(' no existen las credenciales');window.location= 'index.php' </script>";
}