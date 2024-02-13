<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('modelo/conexion.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h2>Registrar usuario</h2>
        <div class="card-header text-center">
            <form class="row g-3" method="post" id="formregistro" action="registrar_usuario.php">

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="txtcorreo1" placeholder="ejm@dominio.com" required>
                </div>

                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtpassword1" placeholder="letras numeros mayusculas caracter especial" minlength="18" maxlength="18" required>
                </div>
                <div class="col-md-4">
                    <label for="inputAddress" class="form-label">nombre</label>
                    <input type="text" class="form-control" name="txtnombre1" required>
                </div>

                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">apellido paterno</label>
                    <input type="text" class="form-control" name="txt_apellido_p" required>
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">apellido materno</label>
                    <input type="text" class="form-control" name="txt_apellido_m" required>
                </div>
                <div class="col-md-3">
                    <label for="inputZip" class="form-label">numero celular</label>
                    <input type="text" class="form-control" name="numero_celular" minlength="10" maxlength="10" required>
                </div>
                <div class="col-md-3">
                    <label for="inputZip" class="form-label">numero de telefono</label>
                    <input type="text" class="form-control" name="numero_telefono" minlength="10" maxlength="10" required>
                </div>
                <div class="col-md-2">
                    <label for="inputState" class="form-label">plantel</label>
                    <select class="form-select  mt-15" name="txt_plantel1" required>
                        <option value="0">Seleccione</option>
                        <?php
                        $fk_plantel = "SELECT id_plantel, nom_plantel FROM plantel";
                        $result = mysqli_query($conn, $fk_plantel);

                        while ($valor = mysqli_fetch_array($result)) {
                            echo '<option value="' . $valor['id_plantel'] . '">' . $valor['nom_plantel'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="inputState" class="form-label">rol</label>
                    <select class="form-select  mt-15" name="fk_rol" required>
                        <option value="0">Seleccione</option>
                        <?php
                        $fk_plantel = "SELECT id_rol, rol FROM rol";
                        $result = mysqli_query($conn, $fk_plantel);

                        while ($valor = mysqli_fetch_array($result)) {
                            echo '<option value="' . $valor['id_rol'] . '">' . $valor['rol'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="inputState" class="form-label">% beca</label>
                    <select class="form-select  mt-15" name="txt_beca1" required>
                        <option selected disabled value="0">Seleccione</option>
                        <?php
                        $fk_beca = "SELECT id_beca, porcentaje_beca FROM beca";
                        $result = mysqli_query($conn, $fk_beca);

                        while ($valor1 = mysqli_fetch_array($result)) {
                            echo '<option value="' . $valor1['id_beca'] . '">' . $valor1['porcentaje_beca'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputCity" class="form-label">modalidad</label>
                    <select class="form-select  mt-15" name="txt_modalidad">
                        <option value="0" required>Seleccione</option>
                        <?php
                        $fk_modalidad = "SELECT id_modalidad, tipo_modalidad FROM modalidad";
                        $result3 = mysqli_query($conn, $fk_modalidad);

                        while ($valor3 = mysqli_fetch_array($result3)) {
                            echo '<option value="' . $valor3['id_modalidad'] . '">' . $valor3['tipo_modalidad'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputState" class="form-label">carrera</label>
                    <select class="form-select  mt-15" name="txt_carrera" required>
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
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="formregistro" name="formregistro">registrar usuario</button>
                    <a class="btn btn-primary" href="tabla_db_usu.php" role="button">incio</a>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>