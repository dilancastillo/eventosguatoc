<?php
require 'header.php';
?>
<div style="width: 60%; margin:0px auto">
<section class="row justify-content-center mt-5">
        <article class="row d-flex justify-content-center">
                <h1 class="text-center" style="color:#ffffff">Ingreso</h1><br><br>
                        <form id="formulario" name="formulario" method="POST">
                                <p class="col-12 text-center mt-5" style="color:#ffffff"><label for="user"><i class="fas fa-user"></i> Ingrese su correo</label></p>
                                <p><input style="margin-left: 360px" type="text" name="user" placeholder="Correo" require></p><br><br>
                                <p class="col-12 text-center" style="color:#ffffff"><label for="user"><i class="fas fa-key"></i> Ingrese su contraseña</label></p>
                                <p><input style="margin-left: 360px" type="password" name="passuser" placeholder="Contraseña" require></p><br><br><br>
                                <p class="col-12 text-center"><a href="inicio.php"><button onclick="ingresar()" class="btn btn-danger" name="envio" id="envio">Ingresar</button></a></p>
                        </form>
        </article>
        </section>
</div><br><br><br><br>
<?php
require 'footer.php';
?>
<script src="Scripts/login.js"></script>