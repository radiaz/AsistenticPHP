<?php
include "validar_session.php";
$title="Observaciones - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
include_once '../clases/funciones.php';
include ("../conexion.php");
$db = new DataBase();
$f = new funciones();
?>
<script src="../js/ajax.js"
	type="text/javascript"></script>

<div class="wrapper">

	<h2 align="center">Informaci&oacute;n de Perfil</h2>
	<table align="center">
		<thead>
			<tr>
				<th colspan="3">Observaci&oacutenes <?php echo ' para: '; $query = "select prinom_al,segnom_al,priape_al,segape_al from alumnos where id_alumno = ".$_POST['alumno']."";
				$db->set_query($query);
				$db->exec_query("../");
				$datos = $db->get_values();
				if ($datos[0][0] != "empty"){
					foreach ($datos as $datos){
						echo ''.$datos['prinom_al'].' '.$datos['segnom_al'].' '.$datos['priape_al'].' '.$datos['segape_al'].' en el mes:'.$_POST['mes'];
					    }
				}else{
					?> <!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
					<script language='javascript'>
															alert('No se encuentra el estudiante')
															location.href='ver-observaciones';
														</script> <?php 
		
		
				}?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th><label><b>Observaci&oacuten</b> </label></th>
				<th><label><b>Fecha</b> </label></th>
				<th><label><b>Docente</b> </label></th>
			</tr>
			<?php 
			$ano = $f->get_ano();
			$query1 = "Select * from observaciones where id_alumno = '".$_POST['alumno']."' and fecha like '".$ano."-".$_POST['mes']."-%'";
			$db->set_query($query1);
			$db->exec_query("../");
			$datos1 = $db->get_values();
			if ($datos1[0][0] != "empty"){
				foreach ($datos1 as $datos1){
					echo '<tr><td>'.$datos1['observacion'].'</td><td>'.$datos1['fecha'].'</td>';
					
					$query2 = "select prinom_doc,segnom_doc,priape_doc,segape_doc from docentes where id_docente = ".$datos1['id_docente']."";
					
					$db->set_query($query2);
					$db->exec_query("../");
					$datos2 = $db->get_values();
					if ($datos2[0][0] != "empty"){
						foreach ($datos2 as $datos2){

							echo '<td>'.$datos2['prinom_doc'].' '.$datos2['segnom_doc'].' '.$datos2['priape_doc'].' '.$datos2['segape_doc'].'</td>';

						}
					}
					echo'</tr>';
				}
			}else{

				?>
			<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
			<script language='javascript'>
										alert('El alumno seleccionado no presenta observaciones para el mes')
										location.href='ver-observaciones';
									</script>
			<?php 
			}
			?>
		</tbody>

		<tfoot>
			<tr>
				
			</tr>
		</tfoot>
	</table>

</div>
<!--end of wrapper-->

<?php 
include ("footer.php");
?>