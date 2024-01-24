<?php
session_start();
include('modelo/conexion.php');
if (isset($_SESSION['usuario'])) {
	$usuarioingresado = $_SESSION['usuario'];
	// $buscandousu = mysqli_query($conn,"SELECT * FROM contacto WHERE correo = '".$usuarioingresado."'");
	// $mostrar=mysqli_fetch_array($buscandousu);

} else {
	header('location: index.php');
}

?>
<?php
$_SESSION['rol'];
$usu_rol = (int)$_SESSION['rol']; //(int)
print_r($usu_rol);
// print_r($_SESSION['usuario']);
// print_r($_SESSION['rol']);

$_SESSION['usuario'];
$usuario_ver = (int)$_SESSION['usuario']; //(int)
print_r($usuario_ver);
?>


<html>

<head>
	<title>Referencias UPEM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="BarraLateral"> 
		<img class="upem" src="img/upem.png" alt="MDN" />

		<ul>
			<?php
			if ($usu_rol <= 2) { //verificacion del los roles de usuario
			?>
				<li>
					<h3 class="text-center">Referencias</h3>
				</li>
				<li class="nav-item">
					<a href="tabla_referencias.php">Tabla de datos</a>
				</li>
				<?php
				if ($usu_rol == 1) { //verificacion del los roles de usuario
				?>
					<li class="nav-item ">
						<a class="nav-link" href="tabla_db_usu.php">tabla_db_usu </a>
					</li>
			<?php
				}
			}
			?>
			<li><a href="cerrar_sesion.php">Cerrar sesión<span></a></li>
		</ul>
		<hr>
	</div>
</body>

</html>