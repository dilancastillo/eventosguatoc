<?php
require 'header.php';
?>
<div style="width: 60%; margin:0px auto">
    <section class="row" style="width: 90%; margin: 0px auto;">
        <article class="col">
            <h1 style="color: white">Registro</h1>
                <form method="POST" name="formulario" id="formulario">
                    <p>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="name" style="color: white">Ingrese sus nombres</label></p>
                            <p><input type="text" placeholder="Nombres" name="name" required><span style="color: #d93843"> *Obligatorio</span></p>
                        </div>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="apel" style="color: white">Ingrese sus apellidos</label></p>
                            <p><input type="text" placeholder="apellidos" name="apel" required><span style="color: #d93843"> *Obligatorio</span></p>
                        </div>
                    </p>
                    <p>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="correo" style="color: white">Email</label></p>
                            <p><input type="email" placeholder="Email" name="correo" required><span style="color: #d93843"> *Obligatorio</span></p>
                        </div>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="telefono" style="color: white">Numero de telefono</label></p>
                            <p><input type="text" placeholder="Telefono" name="telefono" required></p>
                        </div>
                    </p>
                    <p>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="tipod" style="color: white">Tipo documento</label></p>
                            <p><select class="tipod ml-4" name="tipod">
						        <option value="cc" selected="select">Cedula de ciudadania</option>
						        <option value="ce">Cedula de extranjeria</option>
                            </select><span style="color: #d93843"> *Obligatorio</span></p>
                        </div>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="document" style="color: white">Numero de documento</label></p>
                            <p><input type="text" placeholder="Numero documento" name="document" required><span style="color: #d93843"> *Obligatorio</span></p>
                        </div>
                    </p>
                    <p>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="pass" style="color: white">Contraseña</label></p>
                            <p><input type="password" placeholder="Contraseña" name="pass" id="pass" required><span style="color: #d93843"> *Obligatorio</span></p>
                        </div>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><label for="passAgain" style="color: white">Valida contraseña</label></p>
                            <p><input type="password" placeholder="Contraseña" name="passAgain" id="passAgain" required></p><span class="info"></span>
                        </div>
                    </p>
                    <p>
                        <div style="float:left; margin: 20px; padding: 12px">
                            <p><input type="checkbox" name=acepto required><label for="acepto" style="color: white"> Acepto las politicas y condiciones de EventosGuatoc</label></p>
                        </div>
                    </p>
                    <br><br><p>
                        <button onclick="mostrarform(true)" class="btn btn-primary" name="envio" id="envio">Enviar</button>
                    </p>
                    <span id="info" style="color:red" value="v"></span>
                </form>
        </article>     
    </section>
</div>
<?php
require 'footer.php';
?>
<script src="Scripts/registro.js"></script>