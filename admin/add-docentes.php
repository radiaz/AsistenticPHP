<?php
include "validar_session.php";
$title="Agregar docentes - AsistenTIC"; 
include ("header.php");
?> 
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#add-docente").validate({
		rules: {
			pnombre_doc: { required: true,},
			papellido_doc: { required: true},			
			email_doc: {required: true, email: true},
		},
		messages: {
			pnombre_doc: "Campo obligatorio (*)",
			papellido_doc: "Campo obligatorio (*)",			
			email_doc: {required: "Campo obligatorio (*)", email: "Digite un email valido"},
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="agregar" id="add-docente" name="add-docente"> 	        
        <input type="hidden" id="add" name="add" value="docente" />
        <h2 align="center">Registro de Docentes</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="pnombre_doc">Primer Nombre (*)</label></td><td><input type="text" class="input_full" id="pnombre_doc" name="pnombre_doc" maxlength="50" required autofocus /></td></tr>
        <tr><td><label for="snombre_doc">Segundo Nombre:</label></td><td><input type="text" class="input_full" id="snombre_doc" name="snombre_doc" maxlength="50" /></td></tr>
        <tr><td><label for="papellido_doc">Primer Apellido (*)</label></td><td><input type="text" class="input_full" id="papellido_doc" name="papellido_doc" maxlength="50" required /></td></tr>
        <tr><td><label for="sapellido_doc">Segundo Apellido:</label></td><td><input type="text" class="input_full" id="sapellido_doc" name="sapellido_doc" maxlength="50" /></td></tr>        
        <tr><td><label for="email_doc">Email (*)</label></td><td><input type="email" class="input_full" id="email_doc" name="email_doc" /></td></tr>
        <tr><td><label for="admin">Administrador:</label></td><td><input type="checkbox" class="input_full" id="admin" name="admin" value="1" /></td></tr>
        </tbody>        
        <tfoot><tr>
        <td align="center" colspan="2">
        <?php if (isset($_GET['error'])){
						switch ($_GET['error']){
							case ("1"):
								echo '<label id="menerr">Ha ocurrido un error inesperado por favor comuniquese con el administrador!!</label><br />';
								break;
							case ("2"):
								echo '<label id="menerr">Por favor diligencie los datos obligatorios (*)</label><br />';
								break;
						}
					}?>        
        <input style="border:medium none;	background:url(../img/aceptar.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="agregar" type="submit" id="agregar" title="Agregar" value="" />&nbsp;&nbsp;&nbsp;
        <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>