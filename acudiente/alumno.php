<?php
include "validar_session.php";
$title="Reportes familiares - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
$db = new DataBase();
?>
<script
	src="../js/ajax.js" type="text/javascript"></script>

<div class="wrapper">


                        <?php
						$cons = "SELECT * FROM acudiente where id_acudiente = ".$_SESSION['id']." ";
						$db->set_query($cons);
						$db->exec_query("../");
						$datos=$db->get_values();
						if($datos[0][0]!="empty"){
						foreach ($datos as $datos){
							
						$query = "SELECT * FROM alumnos where num_id_acudiente = ".$datos['num_docu_acu']." ";
						$db->set_query($query);
						$db->exec_query("../");
						
						$datos2 = $db->get_values();
						
						if ($datos2[0][0] != "empty"){?><h2 align="center">Listado de alumnos</h2>
	<table align="center">
		<thead>
			<tr>
				<th colspan="2">Seleccione un alumno</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Alumnos:</td>
				<td><select class="input_full" id="al" name="al" autofocus
					onchange="ajax('btnalumno',al.value,'boton-alumno.php');"> 
	
						<option value="0">Seleccione un alumno...</option>
                        <?php foreach ($datos2 as $datos2){?>						
						<option value="<?php echo $datos2['id_alumno'] ?>">
							<?php echo html_entity_decode($datos2['prinom_al'])." ".html_entity_decode($datos2['segnom_al'])." ".html_entity_decode($datos2['priape_al'])." ".html_entity_decode($datos2['segape_al']) ?>
						</option>
                        <?php } ?>						
				</select></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td align="center" colspan="2"><div id="btnalumno" align="center"></div></td>
			</tr>
		</tfoot>
	</table>
    <?php 
						} else {
		echo "" ?>    
    <h1 align="center" style="color: RED">NO EXISTEN ESTUDIANTES A SU CARGO</h1>
	<p align="center">
		<input
			style="border: medium none; background: url(../img/cancelar.png) no-repeat center center; height: 64px; width: 64px; cursor: pointer;"
			name="salir" type="button" id="salir" title="Salir" onclick="window.history.back()" value="" />
	</p>	
    <?php } 
						}
    }?>
</div>
<!--end of wrapper-->

<?php 
include ("footer.php");
?>