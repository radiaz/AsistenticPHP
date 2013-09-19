<?php
include "validar_session.php";
$alumno=$_GET['id'];
$title="Agregar observaci&oacute;n - AsistenTIC";
include ("header.php");
include ("../conexion.php");
?>

<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#observaciones").validate({
		rules: {
			nota: { required: true,},						
		},
		messages: {
			nota: "Campo obligatorio (*)",						
		}
	});
});
</script>

<div class="wrapper">

        <form method="POST" action="agregar" id="observaciones" name="observaciones">
        <input type="hidden" id="add" name="add" value="observacion" />
        <h2 align="center">Agregar Observaciones</h2>                
        <table>  
        <tbody>
				<tr>
					<td><label><strong>Docente:</strong></label></td>
					<td>
                    <?php //Consultamos el docente				
$query = mysql_query("SELECT * FROM docentes where id_docente=".$_SESSION['id']." "); 
while($row = mysql_fetch_array($query)){ ?>
                    <label><?php echo html_entity_decode($row['prinom_doc'])." ".html_entity_decode($row['segnom_doc'])." ".html_entity_decode($row['priape_doc'])." ".html_entity_decode($row['segape_doc']); ?></label>
                    <?php } ?>
                    </td>
				</tr>
				<tr>
					<td><label><strong>Alumno:</strong></label></td>
					<td>
                    <?php //Consultamos el alumno
$query = mysql_query("SELECT * FROM alumnos where id_alumno=".$alumno." "); 
while($row = mysql_fetch_array($query)){ ?>
                    <input type="hidden" id="id" name="id" value="<?php echo $alumno ?>" />
                    <label><?php echo html_entity_decode($row['prinom_al'])." ".html_entity_decode($row['segnom_al'])." ".html_entity_decode($row['priape_al'])." ".html_entity_decode($row['segape_al']); ?></label>
                    <?php } ?>
                    </td>
				</tr>				
				<tr>
					<td><label><strong>Observaciones:</strong></label></td>
					<td><textarea class="input_full" id="nota" name="nota" rows="6" required></textarea></td>
				</tr>                
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
        <input style="border:medium none;	background:url(../img/save.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Guardar" type="submit" title="Guardar" value="" />&nbsp;&nbsp;&nbsp;&nbsp;
        <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />                       
        </td></tr>        
        </tfoot>
        </table>
        </form>

</div><!--end of wrapper-->

<?php
include ("footer.php");
?>