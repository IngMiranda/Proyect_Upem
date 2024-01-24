<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Referencias UPEM</title>
  <link rel="stylesheat" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

</head>
<?php
include("barra_lateral.php");

$sqlusu = " SELECT * FROM contacto contacto 
INNER JOIN usuario usuario ON contacto.fk_usuario = usuario.id_matricula
INNER JOIN plantel plantel ON contacto.fk_plantel= plantel.id_plantel
INNER JOIN carrera carrera ON usuario.fk_carrera=carrera.id_carrera 
INNER JOIN modalidad modalidad ON usuario.fk_modalidad=modalidad.id_modalidad
INNER JOIN beca fbeca ON usuario.fk_beca=fbeca.id_beca
INNER JOIN rol rol ON contacto.fk_rol=rol.id_rol
where id_contacto=$usuario_ver"; //$usuario_ver
// print_r($usuario_ver);
// die();
$result = mysqli_query($conn, $sqlusu);

?>
<?php
if ($usu_rol <= 2) { //verificacion del los roles de usuario
?>

  <body>
    <script>
      function eliminar() {
        var respuesta = confirm("seguro quieres eliminar");
        return respuesta
      }
    </script>
    <table>
      <table class="tables" id="myTable">

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
                <a href="referencia.php ?id_contacto=<?= $sqlusu['id_contacto'] ?>" referencia>&#128462 referencia</a>

              </td>
            </tr>

          <?php
          }

          ?>
        </tbody>


      </table>

    </table>
    </div>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    <!-- <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
  </body>

<?php
} else {
  echo "<script> alert('error con rol de usuario');window </script>"; //.location= '.php'
}
?>

</html>