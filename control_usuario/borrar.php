<?php
include("modelo/conexion.php");

if(!empty($_GET["id_contacto"])){
    $id_contacto =$_GET["id_contacto"];
    // print_r($id_contacto);
    $usudelete = mysqli_query($conn, "SELECT * FROM contacto WHERE id_contacto  LIKE '%$id_contacto%' ");
    // print_r($usudelete);
    $resultdatos = mysqli_fetch_array($usudelete);
    // print_r($resultdatos);
    $fk_usuario = $resultdatos[7];
        // printf($fk_usuario);
// die();
    $sql=$conn->query("DELETE FROM contacto  WHERE id_contacto  =$id_contacto  ");
    print_r($sql);
// die();
    if ($sql == 1) {
        $usufk_matricula=$conn->query("DELETE FROM usuario  WHERE id_matricula  =$fk_usuario  ");
        
// die();

    if($sql==1){
        echo '<div class"alert alert-success">fila eliminada correctamente </div>';
    }else{
        echo '<div class"alert alert-success">error al eliminar</div>';
    }
    
}

}
?>