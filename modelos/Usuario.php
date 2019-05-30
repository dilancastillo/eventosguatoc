<?php
    //Se hace referencia a la conexion de base de datos 
    include ("../config/Conexion.php");
    //Se define la clase categoria
    class Usuario{
        //Se define el constructor vacio 
        public function __construct()
        {

        }

        //Metodo para insertar registros 
        public function insertar($nombre, $apellido, $tipodocumento, $documento, $telefono, $email, $contrasenia)
        {
            $sql="INSERT INTO usuario (Rol, Nombre, Apellido, TipoDocumento, Documento, Telefono, Email, Contrasenia)
            VALUES ('cliente', '$nombre', '$apellido', '$tipodocumento', '$documento', '$telefono', '$email', '$contrasenia')";
            return ejecutarConsulta($sql);
        }

        public function editar($idusuario, $nombre, $apellido, $tipodocumento, $documento, $telefono, $email, $contrasenia)
        {
            $sql = "UPDATE usuario
            SET Nombre = '$nombre', Apellido = '$apellido', TipoDocumento = '$tipodocumento', Documento = '$documento', Telefono = '$telefono', Email = '$email', Contrasenia = '$contrasenia'
            WHERE IdUsuario = '$idusuario'";
            return ejecutarConsulta($sql);
        }

        public function listar()
        {
            $sql = "SELECT *
            FROM usuario";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idusuario)
        {
            $sql = "SELECT *
            FROM usuario
            WHERE  IdUsuario = '$idusuario'"; 
            return consultarUnaFila($sql);
        }
    }
?>