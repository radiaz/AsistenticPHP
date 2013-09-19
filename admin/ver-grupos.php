<?php
include "validar_session.php";
$title="Grupos - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?> 
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#grupos").validate({
		rules: {			
			grupo: { required: true,},						
		},
		messages: {			
			grupo: "Seleccione una grupo",					
		}
	});
});
</script>
 
	<div class="wrapper">
    
        <form method="GET" action="mod-grupos" id="grupos" name="grupos">     
        <h2 align="center">Grupos</h2>
        <p align="center"><a href="add-grupos" class="button">+ Agregar Grupos</a></p>        
        <table>
        <thead><tr>
        <th colspan="2">Modificar Grupos</th>
        </tr></thead>        
        <tbody>                
        <tr><td><label for="grupogrupo">Grupos:</label></td>
        <td>
        <select class="input_full" id="grupo" name="grupo">
        <option value="">Seleccione...</option>
        <?php //Consultamos las grupos de la institucion
$query = mysql_query("SELECT * FROM grupos"); 
while($row = mysql_fetch_array($query)){ ?>
        <option value="<?php echo $row['id_grupo'] ?>"><?php echo $row['nom_grupo'] ?></option>
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