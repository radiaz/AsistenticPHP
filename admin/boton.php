<?php
include "validar_session.php";
include("../conexion.php");

if($_POST['cod']!="0"){
echo""?><a class="button" href="ver-alumnos?id=<?php echo $_POST['cod']?>">Ver Alumno</a><?php "";
	}	
?>