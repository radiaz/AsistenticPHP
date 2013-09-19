<?php
include "validar_session.php";
include("../conexion.php");
if($_POST['cod']!="0"){
echo""?><input style="border:medium none;	background:url(../img/lupa.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="ver" type="button" onclick="window.location='ver-alumno?id=<?php echo $_POST['cod']?>'" id="ver" title="Ver Alumno" value="" />
<?php
	}	
?>