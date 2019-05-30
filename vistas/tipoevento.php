<?php
require 'header.php';
?>
<div class="container">        
    <section>
        <div>
            <h1 style="color:white">Eventos</h1>
            <div class="box-tools pull-right"></div>
        </div>
        <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado">
                <thead style="color:#ffffff">
                    <th>Opciones</th>
                    <th>Evento</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                </thead>
                <tbody></tbody>
            </table>
            <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar">Agregar</button>
        </div>
        <div style="height: 400px;" id="formularioregistros">
            <form name="formulario" id="formulario" method="POST" style="margin-left:300px">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" style="color:#ffffff">
                    <label>Nombre:</label>
                    <input type="hidden" name="idcategoria" id="idcategoria">
                    <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" style="color:#ffffff">
                    <label>Categoria:</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" maxlength="256" placeholder="Categoria">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"> Guardar</i></button>
                    <button style="margin-left:1784i4px" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left">Cancelar</i></button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php
require 'footer.php';
?>
<script src="Scripts/tipoevento.js"></script>