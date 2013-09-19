<?php
include "validar_session.php";
$title="Modificar sedes - AsistenTIC"; 
include ("header.php");
$sede=$_GET['sede'];
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-sede").validate({
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
    
        <form method="POST" action="modificar" id="mod-sede" name="mod-sede"> 	        
        <input type="hidden" id="mod" name="mod" value="sede" />
        <input type="hidden" id="idsede" name="idsede" value="<?php echo $sede ?>" />        
        <h2 align="center">Modificar Sedes</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="nomsede">Nombre de la Sede (*)</label></td>
        <td>
        <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM sedes where id_sede = ".$sede." "); 
while($row = mysql_fetch_array($query)){ ?>
        <input type="text" class="input_full" id="nomsede" name="nomsede" maxlength="150" value="<?php echo html_entity_decode($row['nom_sede']) ?>" required autofocus />
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
          <input style="border:medium none;	background:url(../img/save.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Guardar" type="submit" id="Guardar" tabindex="3" title="Guardar" value="" />
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" tabindex="5" onclick="window.location='ver-sedes'" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>