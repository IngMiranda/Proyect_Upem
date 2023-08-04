<title>referenciasupem</title>
<?php
//include("barra_lateral.php");
include('modelo/conexion.php');
$id_matricula = $_GET["id_matricula"];

$sql = $conn->query("SELECT * FROM usuario a 
INNER JOIN contacto b ON a.fk_contacto = b.id_contacto 
INNER JOIN plantel c ON a.fk_plantel=c.id_plantel 
INNER JOIN carrera d ON a.fk_carrera=d.id_carrera 
INNER JOIN modalidad e ON a.fk_modalidad=e.id_modalidad
INNER JOIN beca f ON a.fk_beca=f.id_beca where id_matricula=$id_matricula");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--
    <link rel="stylesheet" href="style.css">
    <script src="diseño.js"></script>
-->
    <link rel="stylesheet" href="style.css">
</head>
<div class="imp-ref">
    <h2 class="text-center bold">Referencia de Pago </h2>
    <table>
        <?php
        while ($mostrar = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="example_tipo" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" name="tipo" value="<?= $mostrar->Nom_usuario ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="example_tipo" class="form-label">APELLIDO PATERNO</label>
                <input type="text" class="form-control" name="tipo" value="<?= $mostrar->apellido_paterno ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="example_tipo" class="form-label">APELLIDO MATERNO</label>
                <input type="text" class="form-control" name="tipo" value="<?= $mostrar->apellido_materno ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="example_modelo" class="form-label">Maestría/LICENCIATURA</label>
                <input type="text" class="form-control" name="modelo" value="<?= $mostrar->nombre_carrera ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="example_motor" class="form-label">PLANTEL</label>
                <input type="text" class="form-control" name="motor" value="<?= $mostrar->nom_plantel ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="example_motor" class="form-label">BECA</label>
                <input type="text" class="form-control" name="motor" value="<?= $mostrar->porcentaje_beca ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="Inputclave_concepto" class="form-label">CLAVE DE CONCEPTO</label>
                <select id="concepto" name="concepto" class="form-label w-20">
                    <option value="0" required>seleccione</option>
                    <?php
                    $fk_clave_concepto = "SELECT * FROM concepto_pago";
                    $result = mysqli_query($conn, $fk_clave_concepto);

                    while ($valor = mysqli_fetch_array($result)) {
                        echo '<option value="' . $valor['id_clave_concepto'] . '">'. $valor['id_clave_concepto'] ." ". $valor['concepto'] ." $". $valor['p_v'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <button class="btn-general" type="button" onclick="javascript:window.print()">&#x1f5a8;&#xfe0f Imprimir</button>
                <a href="index.php" class="btn-general px-40 p-14 " role="button">Regresar</a>
            </div>

        <?php
        }

        ?>
    </table>
    </div>