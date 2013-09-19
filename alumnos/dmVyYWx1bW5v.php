<?php
include "validar_session.php";
include ("../conexion.php");
include_once '../clases/database_quering.php';
$db  = new DataBase();
//Obtenemos el id del estudiante
$alumno=$_GET['id'];
//Consultamos el nombre del alumno
$query = "SELECT prinom_al,segnom_al,priape_al,segape_al FROM alumnos where id_alumno='".$alumno."'";
$db->set_query($query);
$db->exec_query("../");
$datos=$db->get_values();

$title="Estudiantes - AsistenTIC";
include ("header.php");
if ($datos[0][0] != "empty"){
	foreach($datos as $datos){
		$nombre=$datos['prinom_al']." ".$datos['segnom_al']." ".$datos['priape_al']." ".$datos['segape_al'];
	}



	?>
<div class="wrapper">
	<h1 align="center" style="color: #000">
		<?php echo strtoupper($nombre) ?>
	</h1>
	<p align="center">
    <?php if($_SESSION['tipuser']=="docente"){
		    echo "" ?>
		    <a class="button" href="cmVnaXN0cmFy?id=<?php echo $alumno ?>">Registrar Asistencia</a><br />
			<?php } ?>
			<a class="button" href="observacion?id=<?php echo $alumno ?>">Agregar
			Observaci&oacute;n</a>
			<br /><a class="button" href="perfil?id=<?php echo $alumno ?>">Perfil del Alumno</a><br />
            <?php if (isset($_GET['error'])){
						switch ($_GET['error']){
							case ("1"):
								echo '<label id="menerr">Ha ocurrido un error inesperado por favor comuniquese con el administrador!!</label><br />';
								break;
							case ("2"):
								echo '<label id="menerr">No se encuentra asignacion academica para esta hora!!</label><br />';
								break;
								case ("3"):
									echo '<label id="menerr">Ya se encuentra registrada la asistencia para el alumno!!</label><br />';
									break;
						}
					}?>
	</p>
</div>
<!--end of wrapper-->
<?php
}
else{
	echo ""?>
<div class="wrapper">
	<h1 align="center" style="color: RED">ESTUDIANTE NO REGISTRADO</h1>
	<p align="center">
		<input
			style="border: medium none; background: url(../img/cancelar.png) no-repeat center center; height: 64px; width: 64px; cursor: pointer;"
			name="salir" type="button" id="salir" title="Salir" tabindex="5"
			onclick="window.location='/'" value="" />
	</p>
</div>
<?php "";
} 
include ("footer.php");
?>