<?php
include "validar_session.php";
$title="Grados - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#grados").validate({
		rules: {			
			grado: { required: true,},						
		},
		messages: {			
			grado: "Seleccione una grado",					
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="GET" action="mod-grados" id="grados" name="grados">     
        <h2 align="center">Grados</h2>
        <p align="center"><a href="add-grados" class="button">+ Agregar Grados</a></p>        
        <table>
        <thead><tr>
        <th colspan="2">Modificar Grados</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="gradogrado">Grados:</label></td>
        <td>
        <select class="input_full" id="grado" name="grado">
        <option value="">Seleccione...</option>
        <?php //Consultamos las grados de la institucion
$query = mysql_query("SELECT * FROM grados"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_grado'] ?>"><?php echo html_entity_decode($row['nom_grado']) ?></option>
        <?php } ?>
        </select></td></tr>                
        </tbody>        
        <tfoot><tr>
        <td align="center" colspan="2">        
        <input style="border:medium none;	background:url(../img/modify.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" type="submit" title="Modificar" value="" />
          &nbsp;&nbsp;&nbsp;&nbsp;
         <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" tabindex="5" onclick="window.location='institucion'" value="" />               
        </td></tr></tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>