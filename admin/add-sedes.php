<?php
include "validar_session.php";
$title="Agregar sedes - AsistenTIC"; 
include ("header.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#add-sede").validate({
		rules: {
			nomsede: { required: true,},			
		},
		messages: {
			nomsede: "Campo obligatorio (*)",			
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="agregar" id="add-sede" name="add-sede"> 	        
        <input type="hidden" id="add" name="add" value="sede" />
        <h2 align="center">Registro de Sedes</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="nomsede">Nombre de la Sede (*)</label></td><td><input type="text" class="input_full" id="nomsede" name="nomsede" maxlength="150" required autofocus /></td></tr>        
        </tbody>        
        <tfoot><tr>
        <td align="center" colspan="2"><?php if (isset($_GET['error'])){
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