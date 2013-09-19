<?php
include "validar_session.php";
$title="Agregar alumnos - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
$f = new DataBase();
?>
<script
	type="text/javascript" src="../js/ajax.js"></script>
<script
	type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#add-alumno").validate({
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

	<form method="POST" action="agregar" id="add-alumno" name="add-alumno" enctype="multipart/form-data">
        <input type="hidden" id="add" name="add" value="alumno" /> 
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
						name="pnombre" maxlength="50" required autofocus /></td>
				</tr>
				<tr>
					<td><label for="snombre">Segundo Nombre:</label></td>
					<td><input type="text" class="input_full" id="snombre"
						name="snombre" maxlength="50" /></td>
				</tr>
				<tr>
					<td><label for="papellido">Primer Apellido (*)</label></td>
					<td><input type="text" class="input_full" id="papellido"
						name="papellido" maxlength="50" required /></td>
				</tr>
				<tr>
					<td><label for="sapellido">Segundo Apellido:</label></td>
					<td><input type="text" class="input_full" id="sapellido"
						name="sapellido" maxlength="50" /></td>
				</tr>
				<tr>
					<td><label for="tdocumento">Tipo de Documento (*)</label></td>
					<td><select required class="input_full" id="tdocumento"
						name="tdocumento" />
						<option value="">Seleccione...</option>
						<option value="TI">Tarjeta de Identidad</option>
						<option value="RC">Registro Civil</option>
						<option value="CC">C&eacute;dula de Ciudadan&iacute;a</option>
						<option value="CE">C&eacute;dula de Extranjer&iacute;a</option> </select>
					</td>
				</tr>
				<tr>
					<td><label for="ndocumento">N&uacute;mero de Documento (*)</label>
					</td>
					<td><input type="text" class="input_full" id="ndocumento"
						name="ndocumento" maxlength="20" required /></td>
				</tr>
				<tr>
					<td><label for="fnacimiento">Fecha de Nacimiento (*)</label></td>
					<td><input type="date" placeholder="dd/mm/aaaa" class="input_full"
						id="fnacimiento" name="fnacimiento" required /></td>
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
							<option value="<?php echo $datos['id_sede'] ?>">
								<?php echo $datos['nom_sede'] ?>
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
							<select required class="input_full" id="grupo" name="grupo"
								disabled="disabled">
								<option value="">...</option>
							</select>
						</div></td>
				</tr>

				<tr>
					<td><label for="rh">RH (*)</label></td>
					<td><select required class="input_full" id="rh" name="rh" />
						<option value="">Seleccione...</option>
						<option value="O-">O-</option>
						<option value="O+">O+</option>
						<option value="A-">A-</option>
						<option value="A+">A+</option>
						<option value="B-">B-</option>
						<option value="B+">B+</option>
						<option value="AB-">AB-</option>
						<option value="AB+">AB+</option> </select></td>
				</tr>
				<tr>
					<td><label for="ssocial">Seguridad Social:</label></td>
					<td><input type="text" class="input_full" id="ssocial"
						name="ssocial" maxlength="50" /></td>
				</tr>
				<tr>
					<td><label for="sexo">Sexo (*)</label></td>
					<td><select required class="input_full" id="sexo" name="sexo" />
						<option value="">Seleccione...</option>
						<option value="1">Masculino</option>
						<option value="2">Femenino</option> </select></td>
				</tr>
				<tr>
					<td><label for="foto">Foto:</label></td>
					<td><input type="file" class="input_full" id="foto" name="foto" />
					</td>
				</tr>
			</tbody>

			<!-- Empieza el formulario de registro para acudiente -->
			<thead>
				<tr>
					<th colspan="2">Informaci&oacute;n del Acudiente</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><label for="pnombre_ac">Primer Nombre (*)</label></td>
					<td><input type="text" class="input_full" id="pnombre_ac"
						name="pnombre_ac" maxlength="50" required /></td>
				</tr>
				<tr>
					<td><label for="snombre_ac">Segundo Nombre:</label></td>
					<td><input type="text" class="input_full" id="snombre_ac"
						name="snombre_ac" maxlength="50" /></td>
				</tr>
				<tr>
					<td><label for="papellido_ac">Primer Apellido (*)</label></td>
					<td><input type="text" class="input_full" id="papellido_ac"
						name="papellido_ac" maxlength="50" required /></td>
				</tr>
				<tr>
					<td><label for="sapellido_ac">Segundo Apellido:</label></td>
					<td><input type="text" class="input_full" id="sapellido_ac"
						name="sapellido_ac" maxlength="50" /></td>
				</tr>
				<tr>
					<td><label for="tdocumento_ac">Tipo de Documento (*)</label></td>
					<td><select required
						x-moz-errormessage="Seleccione el Tipo de Documento"
						class="input_full" id="tdocumento_ac" name="tdocumento_ac" />
						<option value="">Seleccione...</option>
						<option value="CC">C&eacute;dula de Ciudadan&iacute;a</option>
						<option value="CE">C&eacute;dula de Extranjer&iacute;a</option>
						<option value="TI">Tarjeta de Identidad</option>
						<option value="PSP">Pasaporte</option>
						<option value="DNI">DNI</option> </select></td>
				</tr>
				<tr>
					<td><label for="ndocumento_ac">N&uacute;mero de Documento (*)</label>
					</td>
					<td><input type="text" class="input_full" id="ndocumento_ac"
						name="ndocumento_ac" maxlength="20" required /></td>
				</tr>
				<tr>
					<td><label for="telefono_ac">Tel&eacute;fono (*)</label></td>
					<td><input type="tel" class="input_full" id="telefono_ac"
						name="telefono_ac" maxlength="50" required /></td>
				</tr>
				<tr>
					<td><label for="direccion_ac">Direcci&oacute;n (*)</label></td>
					<td><input type="text" class="input_full" id="direccion_ac"
						name="direccion_ac" maxlength="100" required /></td>
				</tr>
				<tr>
					<td><label for="email_ac">Email</label></td>
					<td><input type="email" class="input_full" id="email_ac"
						name="email_ac" /></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td align="center" colspan="2"><?php if (isset($_GET['error'])){
						switch ($_GET['error']){
							case ("1"):
								echo '<label id="menerr">Ha ocurrido un error inesperado por favor comuniquese con el administrador!!</label><br />';
								break;
							case ("2"):
								echo '<label id="menerr">Por favor diligencie los datos obligatorios (*)</label><br />';
								break;
							case ("3"):
								echo '<label id="menerr">El archivo que esta intentando cargar no es valido</label><br />';
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
include ("footer.php");
?>