<?php
include "validar_session.php";
$title="Cambio de Contrase&ntilde;a - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
include ("../conexion.php");
$db = new DataBase();
?>
<script
	src="../js/ajax.js" type="text/javascript"></script>

<div class="wrapper">

<form method="POST" action="update-pass">
	<h2 align="center">Cambio de Contrase&ntilde;a</h2>
	<table align="center">
		<thead>
			<tr>
				<th colspan="2">Digite su nueva contrase&ntilde;a</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><b>Nueva Clave:</b></td>
				<td><input type="password" size="30" name="clave" id="clave" /></td>
			</tr>
			<tr>
				<td><b>Repita la Nueva Clave:</b></td>					
				<td><input type="password" size="30" name="rclave" id="rclave" /></td>									
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td align="center" colspan="2">
					<?php if (isset($_GET['error'])){
						switch ($_GET['error']){
							case ("1"):
								echo '<label id="menerr">Ha ocurrido un error inesperado por favor comuniquese con el administrador!!</label><br />';
								break;
							case ("2"):
								echo '<label id="menerr">Las contrase&ntilde;as no coinciden (*)</label><br />';
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