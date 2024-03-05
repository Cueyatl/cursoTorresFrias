<?php
    require_once("../modelos/Conexion.php");
    require_once("../modelos/clientesModel.php");

    $opc = $_GET['opc'];
    switch($opc){
        case 1: // Registrar comentarios de los clientes    
            $nombre = $_POST['txtNombre'];
            $email  = $_POST['txtEmail'];
            $tel    = $_POST['txtTelefono'];
            $coment = $_POST['txtComentarios'];

            $clientes = new ClientesModel();
            $res = $clientes->INSERT($nombre,$email,$tel,$coment);
            echo $res;
            break;
        case 2: // Actualizar comentario
            $idComentario = $_POST['hddIdComentario'];
            $nombre = $_POST['txtNombre'];
            $email  = $_POST['txtEmail'];
            $tel    = $_POST['txtTelefono'];
            $coment = $_POST['txtComentarios'];

            $clientes = new ClientesModel();
            $res = $clientes->UPDATE($idComentario,$nombre,$email,$tel,$coment);
            echo $res;
        case 4: // Consultar los datos de la tabla
            $clientes = new ClientesModel();
            $getComments = $clientes->SELECT();
            if($getComments){
                while ( $fila = $getComments->fetch_assoc() ) {
                    echo $fila["nombre"].'<br>';
                    echo $fila["email"].'<br>';
                    echo $fila["telefono"].'<br>';
                    echo $fila["comentario"].'<br>';
                }
            }
            //http:localhost:8080/curso/controlador/clientesController.php?opc=2
            //http://192.168.100.232:8080/curso/
            //echo $mysqli->host_info . "\n";
    }

    

?>