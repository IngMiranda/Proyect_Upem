<?php
session_start();
include('modelo/conexion.php');
if (isset($_SESSION['usuarioingresando'])) {
    header('location: tabla_referencias.php');
}
?>

<html>

<head>
    <title>referenciasupem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>

    <div class="FormCajaLogin">

        <div class="FormLogin">

            <div class="botondeintercambiar">
                <div id="btnvai"></div>
                <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Login</button>
                <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Registrar</button>
                <button type="button" class="botoncambiarcaja" onclick="contacto()" id="btncontacto">contacto</button>
            </div>

            <!-- formulario login -->
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


            <!-- formulario registrar -->
            <form method="post" id="frmregistrar" class="grupo-entradas" action="usuario_registrar.php">
                <h1>Crear nueva cuenta</h1>
                <div class="div-reg">
                    <div class="TextoCajas">Ingresar nombre</div>
                    <input type="text" name="txtnombre1" class="CajaTexto" autocomplete="off" required>

                    <div class="TextoCajas">Apellido Paterno</div>
                    <input type="text" name="txtapellido_p" class="CajaTexto" autocomplete="off" required>

                    <div class="TextoCajas">Apellido Materno</div>
                    <input type="text" name="txt_apellido_m" class="CajaTexto" autocomplete="off" required>
                    <!--
<div class="TextoCajas">Número celular</div>
<input type="text"  name="numero_celular" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">Número local</div>
<input type="text"  name="numero_telefono" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">Ingresar correo</div>
<input type="email" name="txtcorreo1" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">Ingresar contraseña</div>
<input type="password"  name="txtpassword1" class="CajaTexto" autocomplete="off" required>-->
                    <!-- <div class="mt-15">     
            <label for="exampleInputPassword1" class="form-label TextoCajas">Plantel</label></br>
                <select class="CajaTexto  mt-15" name="txt_plantel1">
                    <option value="0">Seleccione</option>
                        <?php
                        // $fk_plantel="SELECT id_plantel, nom_plantel FROM plantel";
                        // $result=mysqli_query($conn,$fk_plantel);

                        // while($valor=mysqli_fetch_array($result)){
                        //     echo '<option value="'.$valor['id_plantel'].'">'.$valor['nom_plantel'].'</option>';
                        // }
                        ?>
                </select>
    </div> -->
                    <div class="mt-15">
                        <label for="exampleInputPassword1" class="form-label TextoCajas">beca</label></br>
                        <select class="CajaTexto  mt-15" name="txt_beca1">
                            <option value="0">Seleccione</option>
                            <?php
                            $fk_beca = "SELECT id_beca, porcentaje_beca FROM beca";
                            $result = mysqli_query($conn, $fk_beca);

                            while ($valor1 = mysqli_fetch_array($result)) {
                                echo '<option value="' . $valor1['id_beca'] . '">' . $valor1['porcentaje_beca'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-15">
                        <label for="exampleInputPassword1" class="form-label TextoCajas">Modalidad</label></br>
                        <select class="CajaTexto  mt-15" name="txt_modalidad">
                            <option value="0">Seleccione</option>
                            <?php
                            $fk_modalidad = "SELECT id_modalidad, tipo_modalidad FROM modalidad";
                            $result3 = mysqli_query($conn, $fk_modalidad);

                            while ($valor3 = mysqli_fetch_array($result3)) {
                                echo '<option value="' . $valor3['id_modalidad'] . '">' . $valor3['tipo_modalidad'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-15">
                        <label for="exampleInputPassword1" class="form-label TextoCajas">Carrera</label></br>
                        <select class="CajaTexto  mt-15" name="txt_carrera">
                            <option value="0">Seleccione</option>
                            <?php
                            $fk_carrera = "SELECT id_carrera, nombre_carrera FROM carrera";
                            $result4 = mysqli_query($conn, $fk_carrera);

                            while ($valor4 = mysqli_fetch_array($result4)) {
                                echo '<option value="' . $valor4['id_carrera'] . '">' . $valor4['nombre_carrera'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-15">
                        <label for="exampleInputPassword1" class="form-label TextoCajas">Contacto</label></br>
                        <select class="CajaTexto  mt-15" name="txt_contacto">
                            <option value="0">Seleccione</option>
                            <?php
                            $fk_contacto = "SELECT id_contacto,correo, numero_celular, numero_telefono, contraseña, fk_plantel FROM contacto";
                            $result2 = mysqli_query($conn, $fk_contacto);

                            while ($valor2 = mysqli_fetch_array($result2)) {
                                echo '<option value="' . $valor2['id_contacto'] . '">' . $valor2['correo'] .  '</option>';//$valor2['numero_celular'] . $valor2['numero_telefono'] . $valor2['contraseña'] . $valor2['fk_plantel'] .   este fragmento de codigo va detras de la variable valor2['correo']
                            }
                            //el regitro se hace seleccionando el contacto que se acaba de registrar pero lo que se necesita es que no aparezca los demas registros que se quede en espera o se seleccione el registro de contacto que se acaba de hacer  
                            ?>
                        </select>
                    </div>

                    <div>
                        <input type="submit" value="Crea nueva cuenta" class="BtnRegistrar" name="btnregistrar">
                    </div>
                </div>
            </form>
            <!-- registro contacto -->

            <form method="POST" id="frmcontacto" class="grupo-entradas" action="usuario_registrar_contacto.php">
                <h1>contacto</h1>
                <div class="TextoCajas">Número celular</div>
<input type="text"  name="numero_celular" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">Número local</div>
<input type="text"  name="numero_telefono" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">Ingresar correo</div>
<input type="email" name="txtcorreo1" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">Ingresar contraseña</div>
<input type="password"  name="txtpassword1" class="CajaTexto" autocomplete="off" required>
                    <div class="mt-15">     
            <label for="exampleInputPassword1" class="form-label TextoCajas">Plantel</label></br>
                <select class="CajaTexto  mt-15" name="txt_plantel1">
                    <option value="0">Seleccione</option>
                        <?php
                        $fk_plantel="SELECT id_plantel, nom_plantel FROM plantel";
                        $result=mysqli_query($conn,$fk_plantel);

                        while($valor=mysqli_fetch_array($result)){
                            echo '<option value="'.$valor['id_plantel'].'">'.$valor['nom_plantel'].'</option>';
                        }
                        ?>
                <!-- <div class="TextoCajas">Ingresar correo</div>
                <input type="email" name="txtcorreo" class="CajaTexto" autocomplete="off" required>

                <div class="TextoCajas">Ingresar contraseña</div>
                <input type="password" name="txtnumero" class="CajaTexto" autocomplete="off" required>

                <div class="mt-15">
                    <label for="exampleInputPassword1" class="form-label TextoCajas">Plantel</label></br>
                    <select class="CajaTexto  mt-15" name="plantel">
                        <option value="0">Seleccione</option>
                        <?php
                        // $fk_categoria = "SELECT id_plantel, nom_plantel FROM plantel";
                        // $result = mysqli_query($conn, $fk_categoria);

                        // while ($valor = mysqli_fetch_array($result)) {
                        //     echo '<option value="' . $valor['id_plantel'] . '">' . $valor['nom_plantel'] . '</option>';
                        // }
                        ?> -->
                    </select>
                </div>
                <div>
                    <input type="submit" value="registrar" class="Btncontacto" name="btncont">
                </div>

            </form>


        </div>
    </div>
    <!-- <script src="diseño.js"></script> -->
</body>
<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
-->

</html>