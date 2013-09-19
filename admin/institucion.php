<?php
include "validar_session.php";
$title="Gesti&oacute;n de la Intituci&oacute;n - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
?>
<script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-institucion").validate({
		rules: {
			nominst: { required: true,},
			nitinst: { required: true},			
			dirinst: { required: true},
			telinst: { required: true, number: true},
		},
		messages: {
			nominst: "Campo obligatorio (*)",
			nitinst: "Campo obligatorio (*)",
			dirinst: "Campo obligatorio (*)",			
			telinst: {required: "Campo obligatorio (*)", number: "Digite un numero"},
		}
	});
});
</script>

 
	<div class="wrapper">
         
        <p align="center">
        <a href="ver-sedes" class="button">Sedes</a>
        <a href="ver-jornadas" class="button">Jornadas</a>
        <a href="ver-grados" class="button">Grados</a>
        <a href="ver-grupos" class="button">Grupos</a>
        <a href="ver-asignaturas" class="button">Asignaturas</a>
        <a href="add-pensum" class="button">Pensum</a>
        <a href="add-asignacion" class="button">Asignaci&oacute;n Acad&eacute;mica</a>
        </p>
    
        <form method="POST" action="modificar" id="mod-institucion" name="mod-institucion"> 	        
        <input type="hidden" id="mod" name="mod" value="institucion" />
        <h2 align="center">Informaci&oacute;n Institucional</h2>        
        <table>
        <thead><tr>
        <th colspan="2">Campos obligatorios (*)</th>
        </tr></thead>        
        <tbody>
        
		<?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM datos_institucionales"); 
while($row = mysql_fetch_array($query)){ ?>
                
        <tr><td><label for="nominst">Nombre de la Instituci&oacute;n (*)</label></td><td><input type="text" class="input_full" id="nominst" name="nominst" maxlength="100" value="<?php echo html_entity_decode($row['nom_institucion']) ?>" required autofocus /></td></tr>
        <tr><td><label for="nitinst">NIT (*)</label></td><td><input type="text" class="input_full" id="nitinst" name="nitinst" maxlength="20" value="<?php echo $row['nit_institucion'] ?>" required /></td></tr> 
        <tr><td><label for="dirinst">Direcci&oacute;n (*)</label></td><td><input type="text" class="input_full" id="dirinst" name="dirinst" maxlength="50" value="<?php echo html_entity_decode($row['dir_institucion']) ?>" required /></td></tr> 
        <tr><td><label for="telinst">Tel&eacute;fono (*)</label></td><td><input type="tel" class="input_full" id="telinst" name="telinst" maxlength="15" value="<?php echo $row['tel_institucion'] ?>" required /></td></tr>
        <tr><td><label for="muninst">Ciudad</label></td><td><input type="text" class="input_full" id="muninst" name="muninst" maxlength="20" value="<?php echo html_entity_decode($row['mun_institucion']) ?>" /></td></tr> 
        <tr><td><label for="depinst">Departamento</label></td><td><input type="text" class="input_full" id="depinst" name="depinst" maxlength="20" value="<?php echo html_entity_decode($row['dep_institucion']) ?>" /></td></tr>    
        <?php } ?>      
        </tbody>        
        <tfoot><tr>
        <td align="center" colspan="2">        
        <input style="border:medium none;	background:url(../img/save.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Guardar" type="submit" id="Guardar" title="Guardar" value="" />               
        </td></tr></tfoot>
        </table>
        </form>       
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>