<?php
include "validar_session.php";
$title="Perfil de Usuario - AsistenTIC";
include ("header.php");
include_once '../clases/database_quering.php';
include ("../conexion.php");
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
				<td><b>Nombre:</b></td>
				<td><?php echo $_SESSION['prinom'].' '.$_SESSION['segnom'].' '.$_SESSION['priape'].' '.$_SESSION['segape']; ?></td>
			</tr>
			<tr>
				<td><b>Correo:</b></td>
					<?php
						$consulta = mysql_query("SELECT email_doc FROM docentes where id_docente = ".$_SESSION['id']." ");											
						while ($res = mysql_fetch_array($consulta)){				
                	?>
				<td><?php echo $res[0] ?></td>
					<?php } ?>				
			</tr>
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