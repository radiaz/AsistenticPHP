<?php
include "validar_session.php";
$title="Modificar docentes - AsistenTIC"; 
include ("header.php");
$docente=$_GET['id'];
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-docente").validate({
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
    
        <form method="POST" action="modificar" id="mod-docente" name="mod-docente"> 	        
        <input type="hidden" id="mod" name="mod" value="docente" />
        <input type="hidden" id="iddocente" name="iddocente" value="<?php echo $docente ?>" />        
        <h2 align="center">Modificar docentes</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>
        <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM docentes where id_docente = ".$docente." "); 
while($row = mysql_fetch_array($query)){ ?>
        </td></tr>
        <tr><td><label for="pnombre_doc">Primer Nombre (*)</label></td><td><input type="text" class="input_full" id="pnombre_doc" name="pnombre_doc" maxlength="50" value="<?php echo html_entity_decode($row['prinom_doc']) ?>" required autofocus /></td></tr>
        <tr><td><label for="snombre_doc">Segundo Nombre:</label></td><td><input type="text" class="input_full" id="snombre_doc" name="snombre_doc" maxlength="50" value="<?php echo html_entity_decode($row['segnom_doc']) ?>" /></td></tr>
        <tr><td><label for="papellido_doc">Primer Apellido (*)</label></td><td><input type="text" class="input_full" id="papellido_doc" name="papellido_doc" maxlength="50" value="<?php echo html_entity_decode($row['priape_doc']) ?>" required /></td></tr>
        <tr><td><label for="sapellido_doc">Segundo Apellido:</label></td><td><input type="text" class="input_full" id="sapellido_doc" name="sapellido_doc" maxlength="50" value="<?php echo html_entity_decode($row['segape_doc']) ?>" /></td></tr>        
        <tr><td><label for="email_doc">Email (*)</label></td><td><input type="email" class="input_full" id="email_doc" name="email_doc" value="<?php echo html_entity_decode($row['email_doc']) ?>" /></td></tr>        <?php } ?>
        </tbody>        
        <tfoot><tr>
        <td align="center" colspan="2"><?php if (isset($_GET['error'])){
						switch ($_GET['error']){
							case ("1"):
								echo '<label id="menerr">No se ha realizado ninguna modificaci&oacute;n!!</label><br />';
								break;
							case ("2"):
								echo '<label id="menerr">Por favor diligencie los datos obligatorios (*)</label><br />';
								break;
						}
					}?>        
          <input style="border:medium none;	background:url(../img/save.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Guardar" type="submit" id="Guardar" title="Guardar" value="" />
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>