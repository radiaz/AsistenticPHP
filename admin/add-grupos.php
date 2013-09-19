<?php
include "validar_session.php";
$title="Agregar grados - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#add-grupo").validate({
		rules: {
			nomgrupo: { required: true,},
			sedegrupo: { required: true,},
			jorgrupo: { required: true,},
			gragrupo: { required: true,},
			dirgrupo: { required: true,},			
		},
		messages: {
			nomgrupo: "Campo obligatorio (*)",
			sedegrupo: "Seleccione una sede (*)",
			jorgrupo: "Seleccione una jornada (*)",
			gragrupo: "Seleccione un grado (*)",
			dirgrupo: "Seleccione un director (*)",			
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="agregar" id="add-grupo" name="add-grupo"> 	        
        <input type="hidden" id="add" name="add" value="grupo" />
        <h2 align="center">Registro de Grupos</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="nomgrupo">Grupo (*)</label></td><td><input type="text" class="input_full" id="nomgrupo" name="nomgrupo" maxlength="6" placeholder="Ej: 601, 6-A, 6A, etc..." required autofocus /></td></tr>
        <tr><td><label for="sedegrado">Sede (*)</label></td>
        <td>
        <select class="input_full" id="sedegrupo" name="sedegrupo">
        <option value="">Seleccione...</option>
        <?php //Consultamos las sedes de la institucion
$query = mysql_query("SELECT * FROM sedes"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_sede'] ?>"><?php echo html_entity_decode($row['nom_sede']) ?></option>
        <?php } ?>
        </select></td></tr>
        <tr><td><label for="jorgrupo">Jornada (*)</label></td>
        <td>
        <select class="input_full" id="jorgrupo" name="jorgrupo">
        <option value="">Seleccione...</option>
        <?php //Consultamos las jornadas de la institucion
$query = mysql_query("SELECT * FROM jornadas"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_jornada'] ?>"><?php echo html_entity_decode($row['nom_jornada']) ?></option>
        <?php } ?>
        </select></td></tr>
        <tr><td><label for="gragrupo">Grado (*)</label></td>
        <td>
        <select class="input_full" id="gragrupo" name="gragrupo">
        <option value="">Seleccione...</option>
        <?php //Consultamos los grados de la institucion
$query = mysql_query("SELECT * FROM grados"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_grado'] ?>"><?php echo html_entity_decode($row['nom_grado']) ?></option>
        <?php } ?>
        </select></td></tr>
        <tr><td><label for="dirgrupo">Director (*)</label></td>
        <td>
        <select class="input_full" id="dirgrupo" name="dirgrupo">
        <option value="">Seleccione...</option>
        <?php //Consultamos los docentes de la institucion
$query = mysql_query("SELECT * FROM docentes where id_docente!=1"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_docente'] ?>"><?php echo html_entity_decode($row['prinom_doc'])." ".html_entity_decode($row['segnom_doc'])." ".html_entity_decode($row['priape_doc'])." ".html_entity_decode($row['segape_doc']) ?></option>
        <?php } ?>
        </select></td></tr>        
        </tbody>        
        <tfoot><tr>
        <td align="center" colspan="2">        
        <input style="border:medium none;	background:url(../img/aceptar.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="agregar" type="submit" id="agregar" title="Agregar" value="" />&nbsp;&nbsp;&nbsp;
        <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>