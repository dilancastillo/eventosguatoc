var tabla; 
function init(){
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}
function limpiar() {
    $("#nombre").val("");
    $("#categoria").val("");
    $("#idtipoevento").val("");    
}
function mostrarform(bandera) {
    limpiar();
    if (bandera) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}
function cancelarform() {
    mostrarform(false);
}
function listar() {
      tabla=$('#tbllistado').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
            ],
        "ajax":
                {
                    url: '../ajax/tipoevento.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },
            "bDestroy":true,
            "iDisplayLength": 5,
            "order": [[0, "desc"]]
        }
        ).DataTable();      
}


function guardaryeditar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tipoevento.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}



//Funcion para desactivar registros
function desactivar(idtipoevento)
{
    //El parametro result recibe true o false dependiendo del clic del usuario al mensaje de confirmacion
    bootbox.confirm("¿Esta seguro de desactivar el evento?", function(result){
        //Si result es verdadero, se desactivara la categoria de lo contrario no 
        if(result)
        {
            //e es el mensaje que recibe la url 
            $.post("../ajax/tipoevento.php?op=desactivar",{idtipoevento : idtipoevento}, function(e){
                bootbox.alert(e);
                //Recarga la tabla datatable 
                tabla.ajax.reload();
            });
        }
    })
}

function activar(idtipoevento)
{
    bootbox.confirm("¿Esta seguro de activar el tipo de evento?", function(result){
        if(result)
        {
            $.post("../ajax/tipoevento.php?op=activar", {idtipoevento : idtipoevento}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}
init();