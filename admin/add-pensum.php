<?php
include "validar_session.php";
$title="Agregar pensum - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#add-pensum").validate({
		rules: {
			asigpensum: { required: true,},
			gradopensum: { required: true,},						
		},
		messages: {			
			asigpensum: "Seleccione una asignatura (*)",
			gradopensum: "Seleccione un grado (*)",						
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="agregar" id="add-pensum" name="add-pensum"> 	        
        <input type="hidden" id="add" name="add" value="pensum" />
        <h2 align="center">Registro de Pensum</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>              
        <tr><td><label for="asigpensum">Asignatura (*)</label></td>
        <td>
        <select class="input_full" id="asigpensum" name="asigpensum">
        <option value="">Seleccione...</option>
        <?php //Consultamos las asignaturas registradas
$query = mysql_query("SELECT * FROM asignaturas"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_asignatura'] ?>"><?php echo html_entity_decode($row['nom_asignatura']) ?></option>
        <?php } ?>
        </select></td></tr>        
        <tr><td><label for="gradopensum">Grado (*)</label></td>
        <td>
        <select class="input_full" id="gradopensum" name="gradopensum">
        <option value="">Seleccione...</option>
        <?php //Consultamos los grados de la institucion
$query = mysql_query("SELECT * FROM grados"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_grado'] ?>"><?php echo html_entity_decode($row['nom_grado']) ?></option>
        <?php } ?>
        </select></td></tr>                
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