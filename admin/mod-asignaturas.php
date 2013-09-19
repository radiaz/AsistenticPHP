<?php
include "validar_session.php";
$title="Modificar asignaturas - AsistenTIC"; 
include ("header.php");
$asignatura=$_GET['asignatura'];
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-asignatura").validate({
		rules: {
			nomasignatura: { required: true,},			
		},
		messages: {
			nomasignatura: "Campo obligatorio (*)",			
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="modificar" id="mod-asignatura" name="mod-asignatura"> 	        
        <input type="hidden" id="mod" name="mod" value="asignatura" />
        <input type="hidden" id="idasignatura" name="idasignatura" value="<?php echo $asignatura ?>" />        
        <h2 align="center">Modificar Asignaturas</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="nomsede">Asignatura (*)</label></td>
        <td>
        <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM asignaturas where id_asignatura = ".$asignatura." "); 
while($row = mysql_fetch_array($query)){ ?>
        <input type="text" class="input_full" id="nomasignatura" name="nomasignatura" maxlength="100" value="<?php echo html_entity_decode($row['nom_asignatura']) ?>" required autofocus />
        <?php } ?>
        </td></tr>        
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
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.location='ver-asignaturas'" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>