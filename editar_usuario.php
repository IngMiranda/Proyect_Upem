<?php
// session_start();
// include('modelo/conexion.php');
// if (isset($_SESSION['usuario'])) {
//     header('location: registro_tabla.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('modelo/conexion.php');
    // include("barra_lateral.php");
    $id_contacto = $_GET["id_contacto"];


    $sqlusu1 = mysqli_query($conn, "SELECT * FROM contacto contacto 
    INNER JOIN usuario usuario ON contacto.fk_usuario = usuario.id_matricula
    INNER JOIN plantel plantel ON contacto.fk_plantel= plantel.id_plantel
    INNER JOIN carrera carrera ON usuario.fk_carrera=carrera.id_carrera 
    INNER JOIN modalidad modalidad ON usuario.fk_modalidad=modalidad.id_modalidad
    INNER JOIN beca fbeca ON usuario.fk_beca=fbeca.id_beca 
    INNER JOIN rol rol ON contacto.fk_rol=rol.id_rol
    WHERE id_contacto=$id_contacto");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h2>Editar usuario</h2>
        <div class="card-header text-center">
            <form class="row g-3" method="post">

                <input type="text" name="id_contacto" value="<?= $_GET["id_contacto"] ?>">

                <?php
                include("control_usuario/editar.php");
                while ($mostrar = $sqlusu1->fetch_object()) { ?>
                    <div class="col-md-5">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="txtcorreo1" placeholder="ejm@dominio.com" value="<?= $mostrar->correo ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="text" class="form-control" name="txtpassword1" placeholder="letras numeros mayusculas caracter especial" minlength="18" maxlength="18" value="<?= $mostrar->contraseña ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">numero celular</label>
                        <input type="text" class="form-control" name="numero_celular" required value="<?= $mostrar->numero_celular ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">numero de telefono</label>
                        <input type="text" class="form-control" name="numero_telefono" value="<?= $mostrar->numero_telefono ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">nombre</label>
                        <input type="text" class="form-control" name="txtnombre1" value="<?= $mostrar->Nom_usuario ?>">
                    </div>

                    <div class="col-md-4">
                        <label for="inputAddress2" class="form-label">apellido paterno</label>
                        <input type="text" class="form-control" name="txt_apellido_p" value="<?= $mostrar->apellido_paterno ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress2" class="form-label">apellido materno</label>
                        <input type="text" class="form-control" name="txt_apellido_m" value="<?= $mostrar->apellido_materno ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="inputState" class="form-label">plantel</label>
                        <select class="form-select  mt-15" name="txt_plantel1">
                            <option value="<?= $mostrar->id_plantel ?>"><?= $mostrar->nom_plantel ?></option>
                            <?php
                            $fk_plantel = "SELECT id_plantel, nom_plantel FROM plantel";
                            $result_plantel = mysqli_query($conn, $fk_plantel);

                            while ($valor_plantel = mysqli_fetch_array($result_plantel)) {
                                if ($mostrar->id_rol != $valor_rol['id_plantel']) {
                                    echo '<option value="' . $valor_plantel['id_plantel'] . '">' . $valor_plantel['nom_plantel'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputState" class="form-label">rol</label>
                        <select class="form-select  mt-15" name="fk_rol">
                            <option value="<?= $mostrar->id_rol ?>"><?= $mostrar->rol ?></option>
                            <?php
                            $fk_rol = "SELECT id_rol, rol FROM rol";
                            $result_rol = mysqli_query($conn, $fk_rol);

                            while ($valor_rol = mysqli_fetch_array($result_rol)) {
                                if ($mostrar->id_rol != $valor_rol['id_rol']) {
                                    echo '<option value="' . $valor_rol['id_rol'] . '">' . $valor_rol['rol'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="inputState" class="form-label">% beca</label>
                        <select class="form-select  mt-15" name="txt_beca1">
                            <option value="<?= $mostrar->id_beca ?>"><?= $mostrar->porcentaje_beca ?></option>
                            <?php
                            $fk_beca = "SELECT id_beca, porcentaje_beca FROM beca";
                            $result_beca = mysqli_query($conn, $fk_beca);

                            while ($valor_beca = mysqli_fetch_array($result_beca)) {
                                if ($mostrar->id_beca != $valor_beca['id_beca']) {
                                    echo '<option value="' . $valor_beca['id_beca'] . '">' . $valor_beca['porcentaje_beca'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputCity" class="form-label">modalidad</label>
                        <select class="form-select  mt-15" name="txt_modalidad">
                            <option value="<?= $mostrar->id_modalidad ?>"><?= $mostrar->tipo_modalidad ?></option>
                            <?php
                            $fk_modalidad = "SELECT id_modalidad, tipo_modalidad FROM modalidad";
                            $result_modalidad = mysqli_query($conn, $fk_modalidad);

                            while ($valor_modalidad = mysqli_fetch_array($result_modalidad)) {
                                if ($mostrar->id_modalidad != $valor_modalidad['id_modalidad']) {
                                    echo '<option value="' . $valor_modalidad['id_modalidad'] . '">' . $valor_modalidad['tipo_modalidad'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">carrera</label>
                        <select class="form-select  mt-15" name="txt_carrera">
                            <option value="<?= $mostrar->id_carrera ?>"><?= $mostrar->nombre_carrera ?></option>
                            <?php
                            $fk_carrera = "SELECT id_carrera, nombre_carrera FROM carrera";
                            $result_carrera = mysqli_query($conn, $fk_carrera);

                            while ($valor_carrera = mysqli_fetch_array($result_carrera)) {
                                if ($mostrar->id_carrera != $valor_carrera['id_carrera']) {
                                    echo '<option value="' . $valor_carrera['id_carrera'] . '">' . $valor_carrera['nombre_carrera'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">

                    <?php }
                    ?>
                    <button type="submit" class="btn btn-primary" name="formeditar" value="ok">editar usuario</button>
                    <a class="btn btn-primary" href="tabla_db_usu.php" role="button">incio</a>
                    </div>

            </form>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>