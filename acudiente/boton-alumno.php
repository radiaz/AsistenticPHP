<?php
include "validar_session.php";
include("../conexion.php");
if($_POST['cod']!="0"){
echo""?>
<a href="asistencias?id=<?php echo $_POST['cod']?>" class="button">Reporte de Asistencias</a>&nbsp;&nbsp;
<a href="observaciones?id=<?php echo $_POST['cod']?>" class="button">Reporte de Observaciones</a>
<?php
	}	
?>