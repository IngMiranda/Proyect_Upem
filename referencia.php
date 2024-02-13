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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <title>referenciasupem</title>
    <?php
    include('modelo/conexion.php');
    $id_contacto = $_GET["id_contacto"];

    $sql = $conn->query("SELECT * FROM contacto contacto 
    INNER JOIN usuario usuario ON contacto.fk_usuario = usuario.id_matricula
    INNER JOIN plantel plantel ON contacto.fk_plantel= plantel.id_plantel
    INNER JOIN carrera carrera ON usuario.fk_carrera=carrera.id_carrera 
    INNER JOIN modalidad modalidad ON usuario.fk_modalidad=modalidad.id_modalidad
    INNER JOIN beca fbeca ON usuario.fk_beca=fbeca.id_beca where id_contacto =$id_contacto");
    ?>
</head>

<body>
    <div class="imp-ref  container">

        <h2 class="text-center bold">Referencia de Pago </h2>
        <?php
        while ($mostrar = $sql->fetch_object()) { ?>


            <form class="row g-3">
                <!-- <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div> -->
                <div class="col-4">
                    <label for="inputAddress" class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" name="NOMBRE" value="<?= $mostrar->Nom_usuario ?>" disabled>
                </div>
                <div class="col-4">
                    <label for="inputAddress2" class="form-label">APELLIDO PATERNO</label>
                    <input type="text" class="form-control" name="apellido_paterno" value="<?= $mostrar->apellido_paterno ?>" disabled>
                </div>
                <div class="col-4">
                    <label for="inputAddress2" class="form-label">APELLIDO MATERNO</label>
                    <input type="text" class="form-control" name="apellido_materno" value="<?= $mostrar->apellido_materno ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">PLANTEL</label>
                    <input type="text" class="form-control" name="nom_plantel" value="<?= $mostrar->nom_plantel ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">LICENCIATURA</label>
                    <input type="text" class="form-control" name="nombre_carrera" value="<?= $mostrar->nombre_carrera ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">COSTO DE LA CARRERA</label>
                    <input type="text" class="form-control" name="costo_carrera" value="<?= "   $" . $mostrar->costo_carrera ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">BECA</label>
                    <input type="text" class="form-control" name="porcentaje_beca" value="<?= $mostrar->porcentaje_beca ?>" disabled>
                </div>
                <div class="col-md-6">
                <?php
                $porcentaje_beca = floatval($mostrar->porcentaje_beca);
                $costo_carrera = floatval($mostrar->costo_carrera);

                // Calcular el valor de la beca
                $beca = $porcentaje_beca / 100 * $costo_carrera;
                $result = $costo_carrera - $beca;
                ?>
                    <label for="inputCity" class="form-label">COSTO DE LA CARRERA CON BECA DEL <?= $mostrar->porcentaje_beca ?></label>
                    <input type="text" class="form-control" name="costo_carrera" value="<?= "   $" . $result ?>" disabled>
                </div>
                <!-- <div class="col-md-6">
                    <label for="inputCity" class="form-label">BECA</label>
                    <input type="text" class="form-control" name="motor" value="<?= $mostrar->porcentaje_beca ?>" disabled>
                </div> -->


                <form onsubmit="return validarSeleccion()">
                <div class="col-md-6">
                    <label for="Inputclave_concepto" class="form-label">CLAVE DE CONCEPTO</label>
                    <select id="concepto" name="concepto" class="form-select w-20" onchange="actualizarLabel()" required>
                        <option value="0" required>seleccione</option>
                        <?php
                        $fk_clave_concepto = "SELECT * FROM concepto_pago";
                        $result = mysqli_query($conn, $fk_clave_concepto);

                        if (!$result) {
                            echo "<p>Error al consultar la base de datos: " . mysqli_error($conn) . "</p>";
                        } else {

                            while ($valor = mysqli_fetch_array($result)) {
                                echo '<option value="' . $valor['id_clave_concepto'] . '" data-id-clave-concepto="' . $valor['id_clave_concepto'] . '" data-p-v="' . $valor['p_v'] . '">' . $valor['concepto'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <label id="labelConcepto"></label>
                    <p id="descripcionConcepto"></p>
                </div>
            </form>

            <script>
                function actualizarLabel() {
                    var selectConcepto = document.getElementById("concepto");
                    var labelConcepto = document.getElementById("labelConcepto");
                    var descripcionConcepto = document.getElementById("descripcionConcepto");
                    var opcionSeleccionada = selectConcepto.options[selectConcepto.selectedIndex];
                    var id_clave_concepto = opcionSeleccionada.getAttribute("data-id-clave-concepto");
                    var p_v = opcionSeleccionada.getAttribute("data-p-v");
                    labelConcepto.innerText = "clave del concepto: " + id_clave_concepto + ", p_v: $" + p_v;
                    // descripcionConcepto.innerText = "Aquí puedes mostrar más información sobre el concepto seleccionado";
                }



                function validarSeleccion() {
                    var selectConcepto = document.getElementById("concepto");
                    if (selectConcepto.value == "0") {
                        alert("Por favor, selecciona una opción válida en el menú desplegable");
                        return false;
                    }
                    return true;
                }
            </script>
            <div class="text-center">
                <button class="btn-general" type="button" onclick="javascript:window.print()">&#x1f5a8;&#xfe0f Imprimir</button>
                <a href="index.php" class="btn-general px-40 p-14 " role="button">Regresar</a>
            </div>

        <?php
        }

        ?>
                <!-- <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div> -->
                <!-- <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div> -->
            </form>

    </div>

</body>