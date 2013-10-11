<?php
include "validar_session.php";
$title="Reportes - AsistenTIC";
include ("header.php");
?> 
    
<!--===================================== Inicio Acudientes ===========================================================-->    

	<div class="wrapper">    
    <h1 align="center">Reportes</h1>
    <table>    	
		<tbody align="center">
			<tr>
				<td><label><b>Reporte de Asistencias</b></label></td>								
			</tr>
			<tr>
				<td><input style="border:medium none;	background:url(../img/asistencia.png) no-repeat center center; height:120px; width:120px; cursor:pointer;" onclick="location.href='ver-asistencias'" name="asistencias" type="button" id="asistencias" title="Reporte de Asitencias" value="" /></td>
			</tr>
			<tr>
				<td><label><b>Reporte de Observaciones</b></label></td>
			</tr>
			<tr>							
				<td><input style="border:medium none;	background:url(../img/observaciones.png) no-repeat center center; height:120px; width:120px; cursor:pointer;" onclick="location.href='ver-observaciones'" name="observaciones" type="button" id="observaciones" title="Reporte de Observaciones" value="" /></td>				
			</tr>
			<tr>
				<td>
					<input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />
				</td>
			</tr>	
		</tbody>
	</table>    	
    </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>