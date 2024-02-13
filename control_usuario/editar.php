<?php

if (!empty($_POST["formeditar"])) {
    // echo $_POST["formeditar"];
    // die();
    if (!empty($_POST["numero_celular"]) and !empty($_POST["numero_telefono"]) and !empty($_POST["txtcorreo1"]) and !empty($_POST["txtpassword1"]) and !empty($_POST["txt_plantel1"]) and !empty($_POST["fk_rol"])
        and !empty($_POST["txtnombre1"]) and !empty($_POST["txt_apellido_p"]) and !empty($_POST["txt_apellido_m"]) and !empty($_POST["txt_beca1"]) and !empty($_POST["txt_modalidad"]) and !empty($_POST["txt_carrera"])
        and !empty($_POST["id_contacto"])) {
            
        echo $id_contacto = $_POST['id_contacto'];
        echo $correo1 = $_POST['txtcorreo1'];
        echo $numero_celular = $_POST['numero_celular'];
        echo $numero_telefono = $_POST['numero_telefono'];
        echo $password1 = $_POST['txtpassword1'];
        echo $plantel1 = $_POST['txt_plantel1'];
        echo $fk_rol = $_POST['fk_rol'];
        echo $nombre = $_POST['txtnombre1'];
        echo $apellido_p = $_POST['txt_apellido_p'];
        echo $apellido_m = $_POST['txt_apellido_m'];
        echo $fk_carrera = $_POST['txt_carrera'];
        echo $fk_beca = $_POST['txt_beca1'];
        echo $fk_modalidad = $_POST['txt_modalidad'];
        // die();

        $busqueda_fk_usuario= mysqli_query($conn,"SELECT * FROM contacto WHERE id_contacto  LIKE '%$id_contacto%'");
        print_r($busqueda_fk_usuario);
        $fk_usuario = mysqli_fetch_array($busqueda_fk_usuario);
        print_r($fk_usuario);
        $id_matricula = $fk_usuario[7];
        print_r($id_matricula);
        $contactoedit = mysqli_query($conn, "UPDATE `contacto` SET `correo`='$correo1',`numero_celular`='$numero_celular',`numero_telefono`='$numero_telefono',`contraseña`='$password1',`fk_plantel`='$plantel1',`fk_rol`='$fk_rol',`fk_usuario`='$id_matricula' WHERE id_contacto=$id_contacto");
        print_r($contactoedit);
// die();

        if ($contactoedit == 1) {
        $usuarioedit = $conn->query("UPDATE `usuario` SET `Nom_usuario`='$nombre',`apellido_paterno`='$apellido_p',`apellido_materno`='$apellido_m',`fk_carrera`='$fk_carrera',`fk_modalidad`='$fk_modalidad',`fk_beca`='$fk_beca' WHERE id_matricula=$id_matricula");

            header("location:tabla_db_usu.php");
        } else {
            echo 'error al modificar';
        }
    } else {
        echo "campo vacio";
    }
}
