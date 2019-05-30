var tabla; 
function ingresar() {
      tabla=$('#tbllistado').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
        "ajax":
                {
                    url: '../modelos/ingreso.php',
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