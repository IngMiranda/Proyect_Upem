<?php
session_start();
include('modelo/conexion.php');
if (isset($_SESSION['usuario'])) {
    header('location: tabla_referencias.php');
}
?>

<html>

<head>
    <title>referenciasupem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="FormCajaLogin">

        <div class="FormLogin">

            <div class="botondeintercambiar">
                <div id="btnvai"></div>
                <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Login</button>
                <!-- <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Registrar</button>
                <button type="button" class="botoncambiarcaja" onclick="contacto()" id="btncontacto">contacto</button> -->
            </div>

            <!--formulario login-->
            <form method="POST" id="frmlogin" class="grupo-entradas" action="usuario_ingresar.php">
                <h1>Iniciar sesión</h1>

                <div class="TextoCajas">Ingresar correo</div>
                <input type="email" name="txtcorreo" class="CajaTexto" autocomplete="off" required>

                <div class="TextoCajas">Ingresar contraseña</div>
                <input type="password" name="txtpassword" class="CajaTexto" autocomplete="off" required>

                <div class="mt-15">
                    <label for="exampleInputPassword1" class="form-label TextoCajas">Plantel</label></br>
                    <select class="CajaTexto  mt-15" name="plantel">
                        <option value="0">Seleccione</option>
                        <?php
                        $fk_categoria = "SELECT id_plantel, nom_plantel FROM plantel";
                        $result = mysqli_query($conn, $fk_categoria);

                        while ($valor = mysqli_fetch_array($result)) {
                            echo '<option value="' . $valor['id_plantel'] . '">' . $valor['nom_plantel'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Iniciar sesión" class="BtnLogin" name="btningresar">
                </div>

            </form>

        </div>
    </div>
    <script src="diseño.js"></script>
</body>
<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
-->

</html>