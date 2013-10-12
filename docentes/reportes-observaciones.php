<?php
include "validar_session.php";
$title="Observaciones - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
include ("../conexion.php");
$db = new DataBase();
$est = $_POST['alumno'];
$month = $_POST['mes'];
?>
<script
	src="../js/ajax.js" type="text/javascript"></script>

<div class="wrapper">

	<h2 align="center">Reporte de Observaciones</h2>
	<table align="center">
		<thead>
			<tr>
				<th colspan="2">Datos Recibidos</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><label><b>Alumno:</b></label></td>
				<td><label><?php echo $est; ?></label></td>
			</tr>
			<tr>
				<td><label><b>Mes:</b></label></td>					
				<td><label><?php echo $month; ?></label></td>									
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td align="center" colspan="2">
					<input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />
				</td>	
			</tr>
		</tfoot>
	</table>

</div>
<!--end of wrapper-->

<?php 
include ("footer.php");
?>