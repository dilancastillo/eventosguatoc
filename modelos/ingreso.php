<?php
    include ("../config/Conexion.php");
    class Usuario{
        public function __construct(){}
        public function ingresar($email){
            $sql="SELECT email
                    FROM usuario
                    WHERE email=$email";
            return consultarUnaFila($sql);
        }
    }
?>