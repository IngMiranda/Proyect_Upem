<!DOCTYPE html>

<head>
  <title>referencias upem</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

</head>
<?php

// include("modelo/conexion.php");
include("control_usuario/borrar.php");
include("barra_lateral.php");

$sqlusu1 = " SELECT * FROM contacto contacto 
INNER JOIN usuario usuario ON contacto.fk_usuario = usuario.id_matricula
INNER JOIN plantel plantel ON contacto.fk_plantel= plantel.id_plantel
INNER JOIN carrera carrera ON usuario.fk_carrera=carrera.id_carrera 
INNER JOIN modalidad modalidad ON usuario.fk_modalidad=modalidad.id_modalidad
INNER JOIN beca fbeca ON usuario.fk_beca=fbeca.id_beca
INNER JOIN rol rol ON contacto.fk_rol=rol.id_rol"; //INNER JOIN matricula matricula ON usuario.fk_matricula= matricula.id_matriculas


$result = mysqli_query($conn, $sqlusu1);

?>

<html>

<body>
  <script>
    function eliminar() {
      var respuesta = confirm("seguro quieres eliminar");
      return respuesta
    }
  </script>



  <div class="ContBuscar">
    <div style="float:right;">
      <?php echo "<a class='BotonesTeam5' href=\"registro_tabla.php?\">registrar usuario</a>"; ?>
    </div>
  </div>

  <!-- Button trigger modal -->
  <!-- <div class="modalbtn_registro">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
      Launch demo modal
    </button>

  </div> -->


  <!-- Modal usuario registro-->
  <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          // include("registro_tabla.php");
          ?>
        </div>
        <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">registrar</button>
        <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <div> -->
  <table class="tabla display compact" style="width:50%" id="tablevh">
    <thead>

      <tr>
        <th scope="col">Matricula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido paterno</th>
        <th scope="col">Apellido materno</th>
        <th scope="col">Correo</th>
        <th scope="col">Plantel</th>
        <th scope="col">Carrera</th>
        <th scope="col">Beca</th>
        <th scope="col">rol</th>
        <th scope="col">Acciòn</th>

      </tr>
    </thead>
    <tbody>
      <?php

      while ($sqlusu = mysqli_fetch_array($result)) {

      ?>
        <tr>
          <td><?php echo $sqlusu['id_matricula'] ?></td>
          <td><?php echo $sqlusu['Nom_usuario'] ?></td>
          <td><?php echo $sqlusu['apellido_paterno'] ?></td>
          <td><?php echo $sqlusu['apellido_materno'] ?></td>
          <td><?php echo $sqlusu['correo'] ?></td>
          <td><?php echo $sqlusu['nom_plantel'] ?></td>
          <td><?php echo $sqlusu['nombre_carrera'] ?></td>
          <td><?php echo $sqlusu['porcentaje_beca'] ?></td>
          <td><?php echo $sqlusu['rol'] ?></td>

          <td>

            <a href="editar_usuario.php ?id_contacto=<?= $sqlusu['id_contacto'] ?>" editar>&#128397</a>
            <a onclick="return eliminar()" href="tabla_db_usu.php ?id_contacto=<?= $sqlusu['id_contacto'] ?>" borrar>&#10006</a>
            <a href="referencia.php ?id_contacto=<?= $sqlusu['id_contacto'] ?>" referencia>&#128462 referencia</a>

          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>

  </table>
  <!-- </div> -->

  <div style='text-align:right'>

  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="datatabla.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>