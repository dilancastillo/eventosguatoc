<?php
    //Se hace referencia a la conexion de base de datos 
    include ("../config/Conexion.php");
    //Se define la clase categoria
    class TipoEvento{
        //Se define el constructor vacio 
        public function __construct()
        {

        }

        //Metodo para insertar registros 
        public function insertar($nombre, $categoria)
        {
            $sql="INSERT INTO tipoevento (Nombre, Categoria, Condicion)
            VALUES ('$nombre','$categoria','1')";
            return ejecutarConsulta($sql);
        }

        public function editar($idtipoevento, $nombre, $categoria)
        {
            $sql = "UPDATE tipoevento
            SET Nombre = '$nombre', Categoria = '$categoria'
            WHERE IdTipoEvento = '$idtipoevento'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idtipoevento)
        {
            $sql = "UPDATE tipoevento
            SET Condicion = '0'
            WHERE IdTipoEvento = '$idtipoevento'";
            return ejecutarConsulta($sql);
        }

        public function activar($idtipoevento)
        {
            $sql = "UPDATE tipoevento
            SET Condicion = '1'
            WHERE IdTipoEvento = '$idtipoevento'";
            return ejecutarConsulta($sql);
        }

        public function listar()
        {
            $sql = "SELECT *
            FROM tipoevento";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idtipoevento)
        {
            $sql = "SELECT *
            FROM tipoevento
            WHERE IdTipoEvento = '$idtipoevento'"; 
            return consultarUnaFila($sql);
        }
    }
?>