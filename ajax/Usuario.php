<?php
    include("../modelos/Usuario.php");
    $usuario = new Usuario();
    //Se traen los datos del formulario a traves del metodo POST
    $idusuario="";
    $rol="";
    $nombre="";
    $apellido="";
    $tipodocumento="";
    $documento="";
    $telefono="";
    $email="";
    $contrasenia="";
    
    if(isset($_POST["name"])){
        $nombre=$_POST["name"];
    }
    if(isset($_POST["apel"])){
        $apellido=$_POST["apel"];
    }
    if(isset($_POST["correo"])){
        $email=$_POST["correo"];
    }
    if(isset($_POST["telefono"])){
        $telefono=$_POST["telefono"];
    }
    if(isset($_POST["tipod"])){
        $tipodocumento=$_POST["tipod"];
    }
    if(isset($_POST["document"])){
        $documento=$_POST["document"];
    }
    if(isset($_POST["pass"])){
        $contrasenia=$_POST["pass"];
    }
    //Se invocan los metodos de la clase categoria 
    //Se valida el clic del usuario a traves de un parametro 
    //llamado "op" enviado por ajax usando el metodo GET 
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
             if (empty($idusuario)) {
                 $rspta=$usuario->insertar($nombre, $apellido, $tipodocumento, $documento, $telefono, $email, $contrasenia);
                 echo $rspta ? "Usuario registrado" : "Usuario no registrado";
             }
             else {
                $rspta=$usuario->editar($nombre, $apellido, $tipodocumento, $documento, $telefono, $email, $contrasenia);
                echo $rspta ? "Datos actualizados" : "Datos no se pueden actualizar";
             }
            break;
        case 'mostrar':
            $rspta=$tipoevento->mostrar($idtipoevento);
            //Codificar el restultado utilizando json_encode(array)
            echo json_encode($rspta);
            break;

        case 'listar':
            $rspta=$tipoevento->listar();
            //Definir un array (arreglo)
            $data= Array();
            //Carga en la variable $reg el resultado de la consulta ejecutada con el metodo "listar" y realiza un ciclo por cada fila de datos 
            while ($reg=$rspta->fetch_object()) {
                //Almacena cada fila del resultado del SELECT en el array $data[]
                $data[]=array(
                    "0"=>$reg->IdTipoEvento,           
                    "1"=>$reg->Nombre,
                    "2"=>$reg->Categoria,
                    "3"=>$reg->Condicion
                );
            } 
            $results = array(
                "sECHO"=>1, //Mostrar desde la fila 1
                "iTotalRecords"=>count($data), //total registros de la tabla
                "iTotalDisplayRecords"=>count($data), //Total registros a visualizar en pantalla 
                "aaData"=>$data);//En este indice del array llamado "aaData" se envia los datos del array $data
            //Aqui retorna el array $results a traves de Json
            echo json_encode($results); 
            break;
    }
    
?>
