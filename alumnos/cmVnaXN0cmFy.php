<?php 
include 'validar_session.php';
if(isset($_GET["id"])){
	include_once '../clases/database_quering.php';
	$db = new DataBase();
	include_once '../clases/funciones.php';
	$f = new funciones();
	if ($_GET["id"] != ""){

		$hora=$f->get_hora();
		$dia=$f->get_dia();	
		$sql="SELECT asign_academica.id_asignacion from asign_academica,alumnos
		where asign_academica.id_docente = '".$_SESSION['id']."'
		and (".$dia." = 1 and hora_inicio_".$dia."<='".$hora."' and hora_fin_".$dia.">'".$hora."')
		and alumnos.id_grupo = asign_academica.id_grupo and alumnos.id_alumno = '".$_GET['id']."';";

		$db->set_query($sql);
		$db->exec_query("../");
		$datos=$db->get_values();
		if ($datos[0][0] != "empty"){
			foreach($datos as $datos){
				$id_asignacion=$datos['id_asignacion'];
			}
			$fecha = $f->get_fecha();
			$sql="insert into asistencia (id_alumno,id_asignacion,fecha) values ('".$_GET['id']."','".$id_asignacion."','".$fecha." ".$hora."');";
			
			$db->set_query($sql);
			
			$db->exec_query("../");
			
			$resultado=$db->get_num_rows();
			
			if ($resultado==-1){
				header("location:dmVyYWx1bW5v?id=".$_GET['id']."&error=3");
			}else{
				?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
	alert('La asistencia se ha agregado correctamente')
	location.href='dmVyYWx1bW5v?id=<?php echo $_GET['id'] ?>';
</script>
<?php 
			}

		}else{
			header("location:dmVyYWx1bW5v?id=".$_GET['id']."&error=2");

		}

	}else{

		echo ""?>
<div class="wrapper">
	<h1 align="center" style="color: RED">ESTUDIANTE NO REGISTRADO</h1>
	<p align="center">
		<input
			style="border: medium none; background: url(../img/cancelar.png) no-repeat center center; height: 64px; width: 64px; cursor: pointer;"
			name="salir" type="button" id="salir" title="Salir" tabindex="5"
			onclick="window.location='../404'" value="" />
	</p>
</div>
<?php "";

	}
}else{

	echo ""?>
<div class="wrapper">
	<h1 align="center" style="color: RED">ESTUDIANTE NO REGISTRADO</h1>
	<p align="center">
		<input
			style="border: medium none; background: url(../img/cancelar.png) no-repeat center center; height: 64px; width: 64px; cursor: pointer;"
			name="salir" type="button" id="salir" title="Salir" tabindex="5"
			onclick="window.location='../404'" value="" />
	</p>
</div>
<?php "";

}

?>