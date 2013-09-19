<?php
include "validar_session.php";
$title="Asignaci&oacute;n acad&eacute;mica - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#add-asignacion").validate({
		rules: {
			grupoasignacion: { required: true,},
			docasignacion: { required: true,},
			matasignacion: { required: true,},
			horainicio: { required: true,},
			horafin: { required: true,},			
		},
		messages: {			
			grupoasignacion: "Seleccione un grupo (*)",
			docasignacion: "Seleccione un docente (*)",
			matasignacion: "Seleccione una asignatura (*)",
			horainicio: "Campo obligatorio (*)",
			horafin: "Campo obligatorio (*)",			
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="agregar" id="add-asignacion" name="add-asignacion"> 	        
        <input type="hidden" id="add" name="add" value="asignacion" />
        <h2 align="center">Asignaci&oacute;n Acad&eacute;mica</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>              
        <tr><td ><label for="grupoasignacion">Grupo (*)</label></td>
        <td>
        <select class="input_full" id="grupoasignacion" name="grupoasignacion">
        <option value="">Seleccione...</option>
        <?php //Consultamos los grupos de la institucion
$query = mysql_query("SELECT * FROM grupos"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_grupo'] ?>"><?php echo $row['nom_grupo'] ?></option>
        <?php } ?>
        </select></td></tr>
        <tr><td ><label for="docasignacion">Docente (*)</label></td>
        <td>
        <select class="input_full" id="docasignacion" name="docasignacion">
        <option value="">Seleccione...</option>
        <?php //Consultamos los docentes de la institucion
$query = mysql_query("SELECT * FROM docentes where admin!=1"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_docente'] ?>"><?php echo html_entity_decode($row['prinom_doc'])." ".html_entity_decode($row['segnom_doc'])." ".html_entity_decode($row['priape_doc'])." ".html_entity_decode($row['segape_doc']) ?></option>
        <?php } ?>
        </select></td></tr>
        <tr><td ><label for="matasignacion">Asignatura (*)</label></td>
        <td>
        <select class="input_full" id="matasignacion" name="matasignacion">
        <option value="">Seleccione...</option>
        <?php //Consultamos las asignaturas de la institucion
$query = mysql_query("SELECT * FROM asignaturas"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_asignatura'] ?>"><?php echo html_entity_decode($row['nom_asignatura']) ?></option>
        <?php } ?>
        </select></td></tr>
        <tr>
        <td colspan="2" align="center"><label for="dlunes">Lunes:</label>&nbsp;&nbsp;<input type="checkbox" name="dlunes" id="dlunes" /></td></tr>
        <tr><td><label for="hilunes">Inicio:</label></td>
        <td><input type="text" id="hilunes" name="hilunes" placeholder="00:00 24hs" class="input_full" /></td></tr>
        <tr><td><label for="hflunes">Finalizaci&oacute;n:</label></td>
        <td><input type="text" id="hflunes" name="hflunes" placeholder="00:00 24hs" class="input_full" /></td></tr>        
        <tr>
        <td colspan="2" align="center"><label for="dmartes">Martes:</label>&nbsp;&nbsp;<input type="checkbox" name="dmartes" id="dmartes" /></td></tr>
        <tr><td><label for="himartes">Inicio:</label></td>
        <td><input type="text" id="himartes" name="himartes" placeholder="00:00 24hrs" class="input_full" /></td></tr>
        <tr><td><label for="hfmartes">Finalizaci&oacute;n:</label></td>
        <td><input type="text" id="hfmartes" name="hfmartes" placeholder="00:00 24hrs" class="input_full" /></td></tr>        
        <tr>
        <td colspan="2" align="center"><label for="dmiercoles">Mi&eacute;rcoles:</label>&nbsp;&nbsp;<input type="checkbox" name="dmiercoles" id="dmiercoles" /></td></tr>
        <tr><td><label for="himiercoles">Inicio:</label></td>
        <td><input type="text" id="himiercoles" name="himiercoles" placeholder="00:00 24hrs" class="input_full" /></td></tr>
        <tr><td><label for="hfmiercoles">Finalizaci&oacute;n:</label></td>
        <td><input type="text" id="hfmiercoles" name="hfmiercoles" placeholder="00:00 24hrs" class="input_full" /></td></tr>        
        <tr>
        <td colspan="2" align="center"><label for="djueves">Jueves:</label>&nbsp;&nbsp;<input type="checkbox" name="djueves" id="djueves" /></td></tr>
        <tr><td><label for="hijueves">Inicio:</label></td>
        <td><input type="text" id="hijueves" name="hijueves" placeholder="00:00 24hrs" class="input_full" /></td></tr>
        <tr><td><label for="hfjueves">Finalizaci&oacute;n:</label></td>
        <td><input type="text" id="hfjueves" name="hfjueves" placeholder="00:00 24hrs" class="input_full" /></td></tr>        
        <tr>
        <td colspan="2" align="center"><label for="dviernes">Viernes:</label>&nbsp;&nbsp;<input type="checkbox" name="dviernes" id="dviernes" /></td></tr>
        <tr><td><label for="hiviernes">Inicio:</label></td>
        <td><input type="text" id="hiviernes" name="hiviernes" placeholder="00:00 24hrs" class="input_full" /></td></tr>
        <tr><td><label for="hfviernes">Finalizaci&oacute;n:</label></td>
        <td><input type="text" id="hfviernes" name="hfviernes" placeholder="00:00 24hrs" class="input_full" /></td></tr>   
        <tr>
        <td colspan="2" align="center"><label for="dsabado">S&aacute;bado:</label>&nbsp;&nbsp;<input type="checkbox" name="dsabado" id="dsabado" /></td></tr>
        <tr><td><label for="hisabado">Inicio:</label></td>
        <td><input type="text" id="hisabado" name="hisabado" placeholder="00:00 24hrs" class="input_full" /></td></tr>
        <tr><td><label for="hfviernes">Finalizaci&oacute;n:</label></td>
        <td><input type="text" id="hfsabado" name="hfsabado" placeholder="00:00 24hrs" class="input_full" /></td></tr>
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
        <input style="border:medium none; background:url(../img/aceptar.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="agregar" type="submit" id="agregar" title="Agregar" value="" />&nbsp;&nbsp;&nbsp;
        <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>