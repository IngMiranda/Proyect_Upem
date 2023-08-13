<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>referenciasupem</title>
    <link rel="stylesheat" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

</head>
<?php
include("barra_lateral.php");

?>
<?php
$sqlusu=" SELECT * FROM usuario a 
            INNER JOIN contacto b ON a.fk_contacto = b.id_contacto 
            INNER JOIN plantel c ON a.fk_plantel=c.id_plantel 
            INNER JOIN carrera d ON a.fk_carrera=d.id_carrera 
            INNER JOIN modalidad e ON a.fk_modalidad=e.id_modalidad
            INNER JOIN beca f ON a.fk_beca=f.id_beca
          ";


$result = mysqli_query($conn,$sqlusu); 

?>
<body>
<script>
  function eliminar(){
    var respuesta=confirm("seguro quieres eliminar");
    return respuesta
  }

</script>
<table>
    <table class="table" id="myTable">
      
      <thead>          
        <tr>
        <th scope="col">matricula</th>
          <th scope="col">Nombre</th>
          <th scope="col">apellido_paterno</th>
          <th scope="col">apellido_materno</th>
          <th scope="col">contacto</th>
          <th scope="col">plantel</th>
          <th scope="col">carrera</th>
          <th scope="col">beca</th>
          <th scope="col">acccion</th>							
        </tr>
      </thead> 
      <tbody>
      <?php
    while($sqlusu=mysqli_fetch_array($result)){
        
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
          <td>
          <a href="referencia.php ?id_matricula=<?=$sqlusu['id_matricula'] ?>"referencia >&#128462 referencia</a>

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
  <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</body>
<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  -->
</html>
