<?php
include "validar_session.php";
$title="Administradores - AsistenTIC";
include ("header.php");

?> 
    
<!--===================================== Inicio Administrador ===========================================================-->    

	<div class="wrapper">
    <h1 align="center">Men&uacute; Administrador</h1> 
    <p align="center" style="font-size:22px"><strong>Bienvenido <?php echo $_SESSION['prinom'] ?></strong></p>	
    </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>