<?php
include('modelo/conexion.php');

if (empty($_POST["formregistro"])) {
    if (
        !empty($_POST["numero_celular"]) and !empty($_POST["numero_telefono"]) and !empty($_POST["txtcorreo1"]) and !empty($_POST["txtpassword1"]) and !empty($_POST["txt_plantel1"]) and !empty($_POST["fk_rol"])
        and !empty($_POST["txtnombre1"]) and !empty($_POST["txt_apellido_p"]) and !empty($_POST["txt_apellido_m"]) and !empty($_POST["txt_beca1"]) and !empty($_POST["txt_modalidad"]) and !empty($_POST["txt_carrera"])
    ) {


        // echo " " . $correo1 = $_POST['txtcorreo1'];
        // echo " " . $numero_celular = $_POST['numero_celular'];
        // echo " " . $numero_telefono = $_POST['numero_telefono'];
        // echo " " . $password1 = $_POST['txtpassword1'];
        // echo " " . $plantel1 = $_POST['txt_plantel1'];
        // echo " " . $fk_rol = $_POST['fk_rol'];
        // echo " " . $nombre = $_POST['txtnombre1'];
        // echo " " . $apellido_p = $_POST['txt_apellido_p'];
        // echo " " . $apellido_m = $_POST['txt_apellido_m'];
        // echo " " . $fk_carrera = $_POST['txt_carrera'];
        // echo " " . $fk_beca = $_POST['txt_beca1'];
        // echo " " . $fk_modalidad = $_POST['txt_modalidad'];

        $correo1 = $_POST['txtcorreo1'];
        $numero_celular = $_POST['numero_celular'];
        $numero_telefono = $_POST['numero_telefono'];
        $password1 = $_POST['txtpassword1'];
        $plantel1 = $_POST['txt_plantel1'];
        $fk_rol = $_POST['fk_rol'];
        $nombre = $_POST['txtnombre1'];
        $apellido_p = $_POST['txt_apellido_p'];
        $apellido_m = $_POST['txt_apellido_m'];
        $fk_carrera = $_POST['txt_carrera'];
        $fk_beca = $_POST['txt_beca1'];
        $fk_modalidad = $_POST['txt_modalidad'];

        // $domain = explode('@', $correo1);
        // if (checkdnsrr($domain[1]))
        //     echo "Dominio de la dirección válida";

        $correorepetido = mysqli_query($conn, "SELECT * FROM contacto WHERE correo='$correo1'");
        // print_r($correorepetido);
        $resultadocorreo = mysqli_fetch_array($correorepetido);
        // print_r($resultdatos[0]);
        // die();

        if ($resultadocorreo[0] == 0) {
            // die();
            $insertarnombre = mysqli_query($conn, "INSERT INTO usuario(Nom_usuario, apellido_paterno, apellido_materno, fk_carrera, fk_modalidad, fk_beca) values ('$nombre','$apellido_p','$apellido_m','$fk_carrera','$fk_modalidad','$fk_beca');");
            // print_r($insertarnombre);

            if ($insertarnombre == 1) {
                $buscar_id = mysqli_query($conn, "SELECT LAST_INSERT_ID() ");
                // print_r($buscar_id);
                // die();
                $resultdatos = mysqli_fetch_array($buscar_id);
                // print_r($resultdatos);
                // die();
                $fk_usuario = $resultdatos[0];
                // printf($fk_usuario);

                $sql = mysqli_query($conn, "INSERT INTO `contacto`(`correo`, `numero_celular`, `numero_telefono`, `contraseña`, `fk_plantel`,`fk_rol`,`fk_usuario`) VALUES ('$correo1','$numero_celular','$numero_telefono','$password1','$plantel1','$fk_rol','$fk_usuario')");
                // print_r($sql);
                // die();
                echo "<script> alert('se realizo el registro');window.location= 'tabla_db_usu.php' </script>";
            } else {
                echo "error al registrar .-.";
            }
        } else {
            echo "<script>alert('Correo duplicado, intenta con otro correo');window.location='registro_tabla.php';</script>";
        }
    } else {
        echo "<script> alert('tienes que llenar todos los campos  o.o');window.location= 'tabla_db_usu.php' </script>";
    }
}
