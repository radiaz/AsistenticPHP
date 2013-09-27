<?php
include "validar_session.php";
$title="Gesti&oacute;n de docentes - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
$db = new DataBase();
?>
<script
	src="../js/ajax.js" type="text/javascript"></script>

<div class="wrapper">

	<h2 align="center">Informaci&oacute;n de Perfil</h2>
	<table align="center">
		<thead>
			<tr>
				<th colspan="2">Datos Personales</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Nombre:</td>
				<td><?php echo $_SESSION['prinom'].' '.$_SESSION['segnom'].' '.$_SESSION['priape'].' '.$_SESSION['segape']; ?></td>
				<td><select class="input_full" id="doc" name="doc" autofocus
					onchange="ajax('btndocente',doc.value,'boton-docente.php');">
						<option value="0">Seleccione un docente...</option>
						<?php
						$query = "SELECT * FROM docentes where admin != 1";
						$db->set_query($query);
						$db->exec_query("../");
						$datos = $db->get_values();
						foreach($datos as $datos){
                                ?>
						<option value="<?php echo $datos['id_docente'] ?>">
							<?php echo html_entity_decode($datos['prinom_doc'])." ".html_entity_decode($datos['segnom_doc'])." ".html_entity_decode($datos['priape_doc'])." ".html_entity_decode($datos['segape_doc']) ?>
						</option>
						<?php
                            }
                            ?>
				</select></td>
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td align="center" colspan="2"><div id="btndocente"></div></td>
			</tr>
		</tfoot>

	</table>

	<p align="center">
		<a class="button" href="mod-perfil">Modificar Perfil</a>
	</p>

</div>
<!--end of wrapper-->

<?php 
include ("footer.php");
?>