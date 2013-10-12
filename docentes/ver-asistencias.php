<?php
include "validar_session.php";
$title="Asistencias - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
include_once '../clases/funciones.php';
include ("../conexion.php");
$db = new DataBase();
$f = new funciones();
?>
<script
	src="../js/ajax.js" type="text/javascript"></script>

<div class="wrapper">

	<h2 align="center">Informaci&oacute;n de Perfil</h2>
	<table align="center">
		<thead>
			<tr>
				<th colspan="2">Asistencia <?php echo ' Grupo: '.$_POST['id_grupo'].' Mes: '.$_POST['mes'].''; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th><label><b>Nombre</b></label></th>
				<th><label><b>Fallas</b></label></th>
			</tr>
			<?php 
			$query = "Select id_alumno,prinom_al,segnom_al,priape_al,segape_al from alumnos where id_grupo = '".$_POST['id_grupo']."'";
			$db->set_query($query);
			$db->exec_query("../");
			$datos = $db->get_values();
			if ($datos[0][0] != "empty"){
				foreach ($datos as $datos){
					echo '<tr><td>'.$datos['prinom_al'].' '.$datos['segnom_al'].' '.$datos['priape_al'].' '.$datos['segape_al'].'</td>';
					$ano = $f->get_ano();
					$query1 = "select count(asistencia) as fallas from asistencia where id_alumno = ".$datos['id_alumno']." and asistencia = -1 and fecha like '".$ano."-".$_POST['mes']."-%'";
					$db->set_query($query1);
					$db->exec_query("../");
					$datos1 = $db->get_values();
					if ($datos1[0][0] != "empty"){
						foreach ($datos1 as $datos1){
							
							echo '<td>'.$datos1['fallas'].'</td>';
							
						}
					}else{
						?>
						<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
						<script language='javascript'>
							alert('ha ocurrido un error inesperado por favor comuniquese con el administrador')
							location.href='../404';
						</script>
										<?php
						
						
					}
					echo'</tr>';
				}
			}else{
				
				?>
				<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
				<script language='javascript'>
										alert('No se encuentran estudiantes registrados en este grupo')
										location.href='reportes-asistencias';
									</script>
				<?php 
			}
			?>
		</tbody>

		<tfoot>
			<tr>
				<td align="center" colspan="2">
					<a class="button" href="mod-perfil">Modificar Perfil</a>&nbsp;&nbsp;&nbsp;
				    <a class="button" href="password">Cambiar Contrase&ntilde;a</a>
				</td>	
			</tr>
		</tfoot>
	</table>

</div>
<!--end of wrapper-->

<?php 
include ("footer.php");
?>