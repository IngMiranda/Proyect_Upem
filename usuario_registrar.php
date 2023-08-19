<?php
include('modelo/conexion.php');

</head>
<body>
	<h1>¡Bienvenido Universitario!!</h1>
$nombre = $_POST["txtnombre1"];
$apellido_p=$_POST["txtapellido_paterno"];
$apellido_m=$_POST["txt_apellido_materno"];
$fk_contacto=$_POST["txt_contacto"];
$fk_plantel=$_POST["txt_plantel"];
$fk_carrera=$_POST["txt_carrera"];
$fk_referencia=$_POST["txt_referencia"];
$correo = $_POST["txtcorreo1"];
$pass 	= $_POST["txtpassword1"];


$insertarcorreo = mysqli_query($conn,"INSERT INTO contacto(contraseña_correo,correo) values ('$pass','$correo');");
$insertarnombre = mysqli_query($conn,"INSERT INTO usuario(`Nom_usuario`, `apellido_paterno`, `apellido_materno`, `fk_contacto`, `fk_plantel`, `fk_carrera`, `fk_referencia`) values ('$nombre','$apellido_p','$apellido_m',$fk_contacto,$fk_plantel,$fk_carrera,$fk_referencia);");	



if(!$insertarcorreo)
{
echo "<script>alert('Correo duplicado, o invalido');window.location='index.php';</script>";	

header("Refresh: 2; URL=admin.php"); // Redirigir al inicio
echo "Verifica tu informacion. Seras redirigido al inicio.";
exit(); 
}
else
{
echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.php' </script>";

header("Refresh: 2; URL=admin.php"); // Redirigir al inicio
echo "Regitro exitoso. Seras redirigido al inicio.";
exit();
}

?>