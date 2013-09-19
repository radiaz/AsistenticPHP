<?php
include "validar_session.php";
$title="Asignaturas - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#asignaturas").validate({
		rules: {			
			asignatura: { required: true,},						
		},
		messages: {			
			asignatura: "Seleccione una asignatura",					
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="GET" action="mod-asignaturas" id="asignaturas" name="asignaturas">     
        <h2 align="center">Asignaturas</h2>
        <p align="center"><a href="add-asignaturas" class="button">+ Agregar Asignaturas</a></p>        
        <table>
        <thead><tr>
        <th colspan="2">Modificar Asignaturas</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="asignaturaasignatura">Asignaturas:</label></td>
        <td>
        <select class="input_full" id="asignatura" name="asignatura">
        <option value="">Seleccione...</option>
        <?php //Consultamos las asignaturas de la institucion
$query = mysql_query("SELECT * FROM asignaturas"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_asignatura'] ?>"><?php echo html_entity_decode($row['nom_asignatura']) ?></option>
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