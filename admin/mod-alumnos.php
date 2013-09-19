<?php
include "validar_session.php";
$alumno=$_GET['id'];
include_once ("../conexion.php");
include_once '../clases/database_quering.php';
$f = new DataBase();
//Consultamos el alumno
$query = mysql_query("SELECT * FROM alumnos where id_alumno=".$alumno." "); 
if($row = mysql_fetch_array($query)){	    
$nombre=html_entity_decode($row['prinom_al'])." ".html_entity_decode($row['segnom_al'])." ".html_entity_decode($row['priape_al'])." ".html_entity_decode($row['segape_al']);

$title=$nombre;
include ("header.php");
?>
<script
	type="text/javascript" src="../js/ajax.js"></script>
<script
	type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#mod-alumno").validate({
		rules: {
			pnombre: { required: true,},
			papellido: { required: true},
			tdocumento: { required: true},
			tdocumento: { required:true,},
			ndocumento: { required: true, number: true},
			fnacimiento: { required:true, date: true},
			grupo: { required:true},
			rh: { required:true},
			sexo: { required:true},
			pnombre_ac: { required: true},
			papellido_ac: { required: true},
			tdocumento_ac: { required: true},
			tdocumento_ac: { required:true,},
			ndocumento_ac: { required:true, number: true},
			telefono_ac: { required: true, number: true},
			direccion_ac: { required:true,},
			email_ac: {email: true},
		},
		messages: {
			pnombre: "Campo obligatorio (*)",
			papellido: "Campo obligatorio (*)",
			tdocumento: "Seleccione un tipo de documento (*)",
			ndocumento: { required: "Campo obligatorio (*)", number: "Debe ingresar un nÃºmero"},
			fnacimiento: { required:"Campo obligatorio (*)", date: "El formato debe ser dd/mm/aaaa"},
			grupo: "Seleccione un grupo (*)",
			rh: "Campo obligatorio (*)",
			sexo: "Seleccione el sexo (*)",
			pnombre_ac: "Campo obligatorio (*)",
			papellido_ac: "Campo obligatorio (*)",
			tdocumento_ac: "Seleccione un tipo de documento (*)",			
			ndocumento_ac: { required: "Campo obligatorio (*)", number: "Debe ingresar un nÃºmero"},
			telefono_ac: { required: "Campo obligatorio (*)", number: "Debe ingresar un nÃºmero"},
			direccion_ac: "Campo obligatorio (*)",
			email_ac: {email: "Digite un email valido"},
		}
	});
});
</script>

<div class="wrapper">

	<form method="POST" action="modificar" id="mod-alumno" name="mod-alumno" enctype="multipart/form-data">
        <input type="hidden" id="mod" name="mod" value="alumno" />
        <input type="hidden" id="idalumno" name="idalumno" value="<?php echo $row['id_alumno']; ?>"> 
		<h2 align="center">Registro de Alumnos</h2>
		<table>
			<thead>
				<tr>
					<th colspan="2">Informaci&oacute;n del Estudiante</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><label for="pnombre">Primer Nombre (*)</label></td>
					<td><input type="text" class="input_full" id="pnombre"
						name="pnombre" maxlength="50" required autofocus value="<?php echo  html_entity_decode($row['prinom_al']); ?>"/></td>
				</tr>
				<tr>
					<td><label for="snombre">Segundo Nombre:</label></td>
					<td><input type="text" class="input_full" id="snombre"
						name="snombre" maxlength="50" value="<?php echo html_entity_decode($row['segnom_al']); ?>" /></td>
				</tr>
				<tr>
					<td><label for="papellido">Primer Apellido (*)</label></td>
					<td><input type="text" class="input_full" id="papellido"
						name="papellido" maxlength="50" required value="<?php echo html_entity_decode($row['priape_al']); ?>"/></td>
				</tr>
				<tr>
					<td><label for="sapellido">Segundo Apellido:</label></td>
					<td><input type="text" class="input_full" id="sapellido"
						name="sapellido" maxlength="50" value="<?php echo html_entity_decode($row['segape_al']); ?>"/></td>
				</tr>
				<tr>
					<td><label for="tdocumento">Tipo de Documento (*)</label></td>
					<td><select required class="input_full" id="tdocumento"
						name="tdocumento" />
						<option value="">Seleccione...</option>
						<option value="TI" <?php if ($row['tipo_docu_al']=="TI"){echo "selected='selected'";} ?>>Tarjeta de Identidad</option>
						<option value="RC" <?php if ($row['tipo_docu_al']=="RC"){echo "selected='selected'";} ?>>Registro Civil</option>
						<option value="CC" <?php if ($row['tipo_docu_al']=="CC"){echo "selected='selected'";} ?>>C&eacute;dula de Ciudadan&iacute;a</option>
						<option value="CE" <?php if ($row['tipo_docu_al']=="CE"){echo "selected='selected'";} ?>>C&eacute;dula de Extranjer&iacute;a</option> </select>
					</td>
				</tr>
				<tr>
					<td><label for="ndocumento">N&uacute;mero de Documento (*)</label>
					</td>
					<td><input type="text" class="input_full" id="ndocumento"
						name="ndocumento" maxlength="20" required value="<?php echo $row['num_docu_al']; ?>"/></td>
				</tr>
				<tr>
					<td><label for="fnacimiento">Fecha de Nacimiento (*)</label></td>
					<td><input type="date" placeholder="dd/mm/aaaa" class="input_full"
						id="fnacimiento" name="fnacimiento" required value="<?php echo $row['fech_nac']; ?>"/></td>
				</tr>
				<tr>
					<td>Sede:</td>
					<td><select class="input_full" id="sede" name="sede"
						onchange="ajax('jorn',sede.value,'jornada.php');">
							<option value="">Seleccione la sede...</option>
							<?php
							$query ="SELECT * FROM sedes";
							$f->set_query($query);
							$f->exec_query("../");
							$datos=$f->get_values();
							foreach ($datos as $datos){
								?>
							<option value="<?php echo  html_entity_decode($datos['id_sede']); ?>">
								<?php echo  html_entity_decode($datos['nom_sede']); ?>
							</option>
							<?php
							}
							?>
					</select></td>
				</tr>
				<tr>
					<td>Jornada:</td>
					<td><div id="jorn">
							<select class="input_full" id="jornada" name="jornada"
								disabled="disabled">
								<option value="">...</option>
							</select>
						</div></td>
				</tr>

				<tr>
					<td>Grado:</td>
					<td><div id="grad">
							<select class="input_full" id="grado" name="grado"
								disabled="disabled">
								<option value="">...</option>
							</select>
						</div></td>
				</tr>
				<tr>
					<td>Grupo (*)</td>
					<td><div id="grup">
							<select required class="input_full" id="grupo" name="grupo">
							<?php include '../conexion.php';
							$sql = mysql_query("SELECT * FROM grupos");
							      while($row2 = mysql_fetch_array($sql)){
							      	if ($row2['id_grupo']!=$row['id_grupo']){
							      		echo ""?>
							      		        <option value="<?php echo $row2['id_grupo'] ?>"><?php echo html_entity_decode($row2['nom_grupo']) ?></option>
							      		        <?php }else{ ?>
							      		        <option value="<?php echo $row2['id_grupo'] ?>" selected="selected"><?php echo html_entity_decode($row2['nom_grupo']) ?></option>
							      		        <?php } } ?>
							      									      							     
							</select>
						</div></td>
				</tr>

				<tr>
					<td><label for="rh">RH (*)</label></td>
					<td><select required class="input_full" id="rh" name="rh" />
						<option value="">Seleccione...</option>
						<option value="O-" <?php if ($row['rh']=="O-"){echo "selected='selected'";} ?>>O-</option>
						<option value="O+" <?php if ($row['rh']=="O+"){echo "selected='selected'";} ?>>O+</option>
						<option value="A-"<?php if ($row['rh']=="A-"){echo "selected='selected'";} ?> >A-</option>
						<option value="A+" <?php if ($row['rh']=="A+"){echo "selected='selected'";} ?>>A+</option>
						<option value="B-" <?php if ($row['rh']=="B-"){echo "selected='selected'";} ?>>B-</option>
						<option value="B+" <?php if ($row['rh']=="B+"){echo "selected='selected'";} ?>>B+</option>
						<option value="AB-" <?php if ($row['rh']=="AB-"){echo "selected='selected'";} ?>>AB-</option>
						<option value="AB+" <?php if ($row['rh']=="AB+"){echo "selected='selected'";} ?>>AB+</option> </select></td>
				</tr>
				<tr>
					<td><label for="ssocial">Seguridad Social:</label></td>
					<td><input type="text" class="input_full" id="ssocial"
						name="ssocial" maxlength="50" value="<?php echo $row['seguridad_social']; ?>"/></td>
				</tr>
				<tr>
					<td><label for="sexo">Sexo (*)</label></td>
					<td><select required class="input_full" id="sexo" name="sexo" />
						<option value="">Seleccione...</option>
						<option value="1" <?php if ($row['sexo']=="1"){echo "selected='selected'";} ?>>Masculino</option>
						<option value="2" <?php if ($row['sexo']=="2"){echo "selected='selected'";} ?>>Femenino</option> </select></td>
				</tr>
				
			</tbody>

			
				<tr>
					<td align="center" colspan="2"><?php if (isset($_GET['error'])){
						switch ($_GET['error']){
							case ("1"):
								echo '<label id="menerr">No ha realizado ninguna modificaci&oacute;n!!</label><br />';
								break;
							case ("2"):
								echo '<label id="menerr">Por favor diligencie los datos obligatorios (*)</label><br />';
								break;
							
						}
					}?>
                    <input style="border:medium none;	background:url(../img/aceptar.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="agregar" type="submit" id="agregar" title="Agregar" value="" />&nbsp;&nbsp;&nbsp;
        <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />
					</td>
				</tr>
			</tfoot>
		</table>
	</form>

</div>
<!--end of wrapper-->

<?php 
}
include ("footer.php");
?>