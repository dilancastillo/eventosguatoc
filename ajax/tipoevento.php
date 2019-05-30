<?php
    include("../modelos/tipoevento.php");
    $tipoevento = new TipoEvento();
    //Se traen los datos del formulario a traves del metodo POST
    $idtipoevento="";
    $nombre="";
    $categoria="";
    //Recibe el valor de cada variable, siempre y cuando se haya enviado algun valor 
    if(isset($_POST["idcategoria"])){
        $idcategoria=$_POST["idcategoria"];
    }
    if(isset($_POST["nombre"])){
        $nombre=$_POST["nombre"];
    }
    if(isset($_POST["categoria"])){
        $categoria=$_POST["categoria"];
    }

    //Se invocan los metodos de la clase categoria 
    //Se valida el clic del usuario a traves de un parametro 
    //llamado "op" enviado por ajax usando el metodo GET 
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
             if (empty($idtipoevento)) {
                 $rspta=$tipoevento->insertar($nombre,$categoria);
                 echo $rspta ? "Tipo Evento registrado" : "Tipo Evento no se pudo registrar";
             }
             else {
                $rspta=$tipoevento->editar($idtipoevento,$nombre,$categoria);
                echo $rspta ? "Tipo Evento actualizada" : "Tipo Evento no se puede actualizar";
             }
            break;
        
        case 'desactivar':
                $rspta=$tipoevento->desactivar($idtipoevento);
                echo $rspta ? "Tipo Evento Desactivado" : "Tipo Evento no se puede desactivar";
            break;

        case 'activar':
            $rspta=$tipoevento->activar($idtipoevento);
            echo $rspta ? "Tipo Evento Activado" : "Tipo Evento no se puede activar";
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
