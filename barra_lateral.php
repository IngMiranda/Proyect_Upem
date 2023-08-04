<?php
session_start();
include('modelo/conexion.php');
if(isset($_SESSION['usuarioingresando']))
{
$usuarioingresado = $_SESSION['usuarioingresando'];
$buscandousu = mysqli_query($conn,"SELECT * FROM contacto WHERE correo = '".$usuarioingresado."'");
$mostrar=mysqli_fetch_array($buscandousu);
	
}else
{
	header('location: index.php');
}

?>

<html>
<head>
<title>Referencias UPEM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<link rel="stylesheet" href="style.css">
<body>
<div class="BarraLateral">
<img class="upem" src="img/upem.png" alt="MDN" />

<ul>
<li><h3 class="text-center">Referencias</h3></li>
<li><a href="tabla_referencias.php" >Tabla de datos</a></li>
<li><a href="cerrar_sesion.php" >Cerrar sesión<span ></a></li>
</ul>
<hr>
</div>
</body>
</html>