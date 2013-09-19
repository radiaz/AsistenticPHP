<?php
include "validar_session.php";
$title="Jornadas - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#jornadas").validate({
		rules: {			
			jornada: { required: true,},						
		},
		messages: {			
			jornada: "Seleccione una jornada",					
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="GET" action="mod-jornadas" id="jornadas" name="jornadas">     
        <h2 align="center">Jornadas</h2>
        <p align="center"><a href="add-jornadas" class="button">+ Agregar Jornadas</a></p>        
        <table>
        <thead><tr>
        <th colspan="2">Modificar Jornadas</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="sedegrado">Jornadas:</label></td>
        <td>
        <select class="input_full" id="jornada" name="jornada">
        <option value="">Seleccione...</option>
        <?php //Consultamos las sedes de la institucion
$query = mysql_query("SELECT * FROM jornadas"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_jornada'] ?>"><?php echo html_entity_decode($row['nom_jornada']) ?></option>
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