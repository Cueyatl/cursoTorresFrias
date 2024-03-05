<?php
    class ClientesModel{
        function __construct(){}

        function INSERT($nombre, $email, $telefono, $comentario){
            $conexion = new Conexion();
            $mysqli = $conexion->crearConexion();
            $sql = "INSERT INTO tblComentarios (nombre,email,telefono,comentario) 
                values('".$nombre."','".$email."','".$telefono."','".$comentario."')";
            if( $mysqli->query($sql) === TRUE ){
                return "Registro Insertado";
            }
            else{
                return "Ocurrio un error al insertar";
            }
            $mysqli->close();
        }

        function UPDATE($idComentario, $nombre, $email, $telefono, $comentario){
            $conexion = new Conexion();
            $mysqli = $conexion->crearConexion();
            $sql = "UPDATE tblComentario SET nombre = '".$nombre."', email = '".$email."',
            telefono = '".$telefono."', comentario = '".$comentario."' 
            WHERE idComentario = ".$idComentario;
            if( $mysqli->query($sql) == TRUE ){
                return "Se actualizó correctamente el registro";
            }
            else{
                return "Ocurrió un error al actualizar";
            }
            $mysqli->close();
        }

        function DELETE($idComentario){
            $conexion = new Conexion();
            $sql = "DELETE FROM tblComentario WHERE idComentario = ".$idComentario;
            if( $conexion->query($sql) == TRUE ){
                return "Borrado Exitoso";
            }else{
                return "Ocuerrió un error al borrar el registro";
            }
            $conexion->close();
        }

        function SELECT(){
            $conexion = new Conexion();
            $mysqli = $conexion->crearConexion();
            if( $mysqli != null ){
                $getComments = $mysqli->query("select * from tblComentarios");
            }
            return $getComments; 
        }

    }



?>