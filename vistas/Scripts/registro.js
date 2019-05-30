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
    validaContraseña(e);
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
                    url: '../ajax/Usuario.php?op=listar',
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

//el codigo dentro del primer if estaba inicialmente dentro de la funcion mostrarForm
function validaContraseña(e){
    e.preventDefault();
    var password1=document.getElementById("pass");
    var password2=document.getElementById("passAgain");
    var info=document.getElementById("info");
    if(password1!=password2){
        info.innerHTML = "Contraseñas incorrectas";
    }else{
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
}
function guardaryeditar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/Usuario.php?op=guardaryeditar",
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
init();