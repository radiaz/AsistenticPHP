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
				<td><a class="button" href="ver-asistencias">Consultar Asistencias</a></td>							
			</tr>
			<tr>
				<td><label><b>Reporte de Observaciones</b></label></td>
			</tr>
			<tr>							
				<td><a class="button" href="ver-observaciones">Consultar Observaciones</a></td>				
			</tr>	
		</tbody>
	</table>    	
    </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>