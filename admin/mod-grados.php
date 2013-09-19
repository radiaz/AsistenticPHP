<?php
include "validar_session.php";
$title="Modificar grados - AsistenTIC"; 
include ("header.php");
$grado=$_GET['grado'];
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-grado").validate({
		rules: {
			nomgrado: { required: true,},			
		},
		messages: {
			nomgrado: "Campo obligatorio (*)",			
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="POST" action="modificar" id="mod-grado" name="mod-grado"> 	        
        <input type="hidden" id="mod" name="mod" value="grado" />
        <input type="hidden" id="idgrado" name="idgrado" value="<?php echo $grado ?>" />        
        <h2 align="center">Modificar Grados</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="nomsede">Grado (*)</label></td>
        <td>
        <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM grados where id_grado = ".$grado." "); 
while($row = mysql_fetch_array($query)){ ?>
        <input type="text" class="input_full" id="nomgrado" name="nomgrado" maxlength="30" value="<?php echo html_entity_decode($row['nom_grado']) ?>" required autofocus />
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
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.location='ver-grados'" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>