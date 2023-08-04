<?php
include('modelo/conexion.php');

$nombre = $_POST["txtnombre1"];
$apellido_p=$_POST["txtapellido_p"];
$apellido_m=$_POST["txt_apellido_m"];
$numero_celular=$_POST["numero_celular"];
$numero_telefono=$_POST["numero_telefono"];
$fk_contacto=$_POST["txt_contacto"];
$fk_plantel=$_POST["txt_plantel"];
$fk_carrera=$_POST["txt_carrera"];
$fk_referencia=$_POST["txt_referencia"];
$correo = $_POST["txtcorreo1"];
$pass 	= $_POST["txtpassword1"];

$insertarcorreo = mysqli_query($conn,"INSERT INTO contacto(correo,numero_celular,numero_telefono,contraseña,fk_plantel) values ('$correo','$numero_celular','$numero_telefono','$pass','$fk_plantel');");
echo("<script>console.log('PHP: " . $insertarcorreo . "');</script>");

$insertarnombre = mysqli_query($conn,"INSERT INTO usuario(`Nom_usuario`, `apellido_paterno`, `apellido_materno`, `fk_contacto`, `fk_plantel`, `fk_carrera`, `fk_referencia`) values ('$nombre','$apellido_p','$apellido_m',$fk_contacto,$fk_plantel,$fk_carrera,$fk_referencia);");	
echo("<script>console.log('PHP: " . $insertarnombre . $insertarcorreo . "');</script>");
if(!$insertarcorreo)
{
echo "<script>alert('Correo duplicado, intenta con otro correo');window.location='index.php';</script>";	   
}
else
{
echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.php' </script>";
}

?>