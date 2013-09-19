<?php
include "validar_session.php";
$title="Modificar grupos - AsistenTIC"; 
include ("header.php");
$grupo=$_GET['grupo'];
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-grupo").validate({
		rules: {
			nomgrupo: { required: true,},						
		},
		messages: {
			nomgrupo: "Campo obligatorio (*)",						
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="modificar" id="mod-grupo" name="mod-grupo"> 	        
        <input type="hidden" id="mod" name="mod" value="grupo" />
        <input type="hidden" id="idgrupo" name="idgrupo" value="<?php echo $grupo ?>" />
        <h2 align="center">Modificar Grupos</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>
        <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM grupos where id_grupo = ".$grupo." "); 
while($grp = mysql_fetch_array($query)){ ?>      
        <tr><td><label for="nomgrupo">Grupo (*)</label></td><td><input type="text" class="input_full" id="nomgrupo" name="nomgrupo" maxlength="6" value="<?php echo $grp['nom_grupo']; ?>" required autofocus /></td></tr>
        <tr><td><label for="sedegrado">Sede:</label></td>
        <td>
        <select class="input_full" id="sedegrupo" name="sedegrupo">        
        <?php //Consultamos las sedes de la institucion
$query = mysql_query("SELECT * FROM sedes"); 
while($row = mysql_fetch_array($query)){ 
		if ($row['id_sede']!=$grp['id_sede']){
			echo ""?>
        <option value="<?php echo $row['id_sede'] ?>"><?php echo html_entity_decode($row['nom_sede']) ?></option>
        <?php }else{ ?>
        <option value="<?php echo $row['id_sede'] ?>" selected="selected"><?php echo html_entity_decode($row['nom_sede']) ?></option>
        <?php } } ?>
        </select></td></tr>
        <tr><td><label for="jorgrupo">Jornada:</label></td>
        <td>
        <select class="input_full" id="jorgrupo" name="jorgrupo">        
        <?php //Consultamos las jornadas de la institucion
$query = mysql_query("SELECT * FROM jornadas"); 
while($row = mysql_fetch_array($query)){
		if ($row['id_jornada']!=$grp['id_jornada']){
			echo ""?>
        <option value="<?php echo $row['id_jornada'] ?>"><?php echo html_entity_decode($row['nom_jornada']) ?></option>
        <?php }else{ ?>
        <option value="<?php echo $row['id_jornada'] ?>" selected="selected"><?php echo html_entity_decode($row['nom_jornada']) ?></option>
        <?php } } ?>
        </select></td></tr>
        <tr><td><label for="gragrupo">Grado:</label></td>
        <td>
        <select class="input_full" id="gragrupo" name="gragrupo">        
        <?php //Consultamos los grados de la institucion
$query = mysql_query("SELECT * FROM grados"); 
while($row = mysql_fetch_array($query)){
	    if ($row['id_grado']!=$grp['id_grado']){
			echo ""?>
        <option value="<?php echo $row['id_grado'] ?>"><?php echo html_entity_decode($row['nom_grado']) ?></option>
        <?php }else{ ?>
        <option value="<?php echo $row['id_grado'] ?>" selected="selected"><?php echo html_entity_decode($row['nom_grado']) ?></option>
        <?php } } ?>
        </select></td></tr>
        <tr><td><label for="dirgrupo">Director:</label></td>
        <td>
        <select class="input_full" id="dirgrupo" name="dirgrupo">        
        <?php //Consultamos los docentes de la institucion
$query = mysql_query("SELECT * FROM docentes where admin!=1"); 
while($row = mysql_fetch_array($query)){
	    if ($row['id_docente']!=$grp['id_director']){
			echo ""?>
        <option value="<?php echo $row['id_docente'] ?>"><?php echo html_entity_decode($row['prinom_doc'])." ".html_entity_decode($row['segnom_doc'])." ".html_entity_decode($row['priape_doc'])." ".html_entity_decode($row['segape_doc']) ?></option>
        <?php }else{ ?>
        <option value="<?php echo $row['id_docente'] ?>" selected="selected"><?php echo html_entity_decode($row['prinom_doc'])." ".html_entity_decode($row['segnom_doc'])." ".html_entity_decode($row['priape_doc'])." ".html_entity_decode($row['segape_doc']) ?></option>
        <?php } } ?>
        </select></td></tr>        
        </tbody>
        <?php } ?>        
        <tfoot><tr>
        <td align="center" colspan="2">        
        <input style="border:medium none;	background:url(../img/save.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Guardar" type="submit" id="Guardar" title="Guardar" value="" />
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.location='ver-grupos'" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>