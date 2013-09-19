<?php
include "validar_session.php";
//incluyo el archivo de la clase
include_once '../clases/database_quering.php';
include_once '../clases/funciones.php';
//creo una instancia de la clase funciones
$db= new DataBase();
$f =  new funciones();

//pide una contraseña aleatoria
$password = $f->claveRandom();
$pass=$password;
//encripta la contraseña
$f->set_dato_encriptada($password);
$password=$f->get_dato_encriptado();


$Modificar=$_POST['mod'];


switch ($Modificar){

	case "alumno":

	

		//Validamos que no hayan campos vacios para hacer el Insert
		if($_POST['pnombre'] != "" && $_POST['papellido'] != "" && $_POST['tdocumento'] != "" && $_POST['ndocumento'] != "" && $_POST['fnacimiento'] != "" && $_POST['grupo'] != ""  && $_POST['rh'] != "" && $_POST['sexo'] != ""){

			$sql="update alumnos set prinom_al = '".htmlentities($_POST['pnombre'])."',segnom_al = '".htmlentities($_POST['snombre'])."'
			, priape_al = '".htmlentities($_POST['papellido'])."', segape_al = '".htmlentities($_POST['sapellido'])."'
			, tipo_docu_al = '".$_POST['tdocumento']."', num_docu_al = '".$_POST['ndocumento']."', fech_nac =  '".$_POST['fnacimiento']."'
			, id_grupo =  '".$_POST['grupo']."',rh = '".$_POST['rh']."', seguridad_social = '".htmlentities($_POST['ssocial'])."'
			, sexo = '".$_POST['sexo']."' where id_alumno= ".$_POST['idalumno'].";";
			//Guardamos el sql
			$db->set_query($sql);
			//Ejecutamos la query
			$db->exec_query("../");
			//Recuperamos el dato de las filas afectadas
			$resultado=$db->get_num_rows();
			if ($resultado==0){
				header("location:mod-alumnos?id=".$_POST['idalumno']."&error=1");
			}else{
             
				?>
<script language='javascript'>
			alert('El registro se ha modificado correctamente')
			location.href='ver-alumno?id=<?php echo $_POST['idalumno'] ?>';
		</script>
<?php
			}
		}else{
			header("location:mod-alumnos?id=".$_POST['idalumno']."&error=2");
		}

		break;

case "docente":
   
	
	//Validamos que no hayan campos vacios para hacer el Insert
	if($_POST['pnombre_doc'] != "" && $_POST['papellido_doc'] != ""){
		$sql="update docentes set prinom_doc = '".htmlentities($_POST['pnombre_doc'])."'
		, segnom_doc = '".htmlentities($_POST['snombre_doc'])."', priape_doc = '".htmlentities($_POST['papellido_doc'])."'
		, segape_doc = '".htmlentities($_POST['sapellido_doc'])."' where id_docente = ".$_POST['iddocente'].";";
		//Guardamos el sql
		
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-docentes?id=".$_POST['iddocente']."&error=1");
		}else{
			
			?>
	<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
	<script language='javascript'>
		alert('El registro se ha modificado correctamente')
		location.href='ver-docente?id=<?php echo $_POST['iddocente']; ?>';
	</script>
	<?php
			}
		}else{
			header("location:mod-docentes?id=".$_POST['iddocente']."&error=2");
		}
		break;
	
	
case "sede":

	if($_POST['nomsede']!=""&&$_POST['idsede']!=""){

		$sql="update sedes set nom_sede='".htmlentities($_POST['nomsede'])."' where id_sede = ".$_POST['idsede']."";

		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-sede?sede=".$_POST['idsede']."&error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
			alert('El registro se ha modificado correctamente')
			location.href='ver-sedes';
		</script>
<?php 
		}

	}else{
		header("location:mod-sede?sede=".$_POST['idsede']."&error=2");
	}


	break;

case "jornada":

	if($_POST['nomjornada']!=""&&$_POST['idjornada']!=""){

		$sql="update jornadas set nom_jornada='".htmlentities($_POST['nomjornada'])."' where id_jornada = ".$_POST['idjornada']."";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-jornadas?jornada=".$_POST['idjornada']."&error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
				alert('El registro se ha agregado correctamente')
				location.href='ver-jornadas';
			</script>
<?php 
		}

	}else{
		header("location:mod-jornadas?jornada=".$_POST['idsede']."&error=2");
	}


	break;

case "grado":

	if($_POST['nomgrado']!=""&&$_POST['idgrado']!=""){

		$sql="update grados set nom_grado='".htmlentities($_POST['nomgrado'])."' where id_grado = ".$_POST['idgrado']."";

		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-grados?grado=".$_POST['idgrado']."&error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
					alert('El registro se ha modificado correctamente')
					location.href='ver-grados';
				</script>
<?php 
		}

	}else{
		header("location:mod-grados?grados=".$_POST['idgrado']."&error=2");
	}



	break;

case "grupo" :

	if($_POST['nomgrupo']!=""&&$_POST['sedegrupo']!=""&&$_POST['jorgrupo']!=""&&$_POST['gragrupo']!=""&&$_POST['dirgrupo']!=""&&$_POST['idgrupo']!=""){

		$sql="update grupos set nom_grupo='".htmlentities($_POST['nomgrupo'])."',id_sede='".htmlentities($_POST['sedegrupo'])."',id_jornada='".htmlentities($_POST['jorgrupo'])."',id_grado='".htmlentities($_POST['gragrupo'])."',id_director='".htmlentities($_POST['dirgrupo'])."' where id_grupo = ".$_POST['idgrupo']."";

		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-grupos?grupo=".$_POST['idgrupo']."&error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
						alert('El registro se ha modificado correctamente')
						location.href='ver-grupos';
					</script>
<?php 
		}
			
	}else{
		header("location:mod-grupos?grupo=".$_POST['idgrupo']."&error=2");
	}


	break;

case "asignatura":

	if($_POST['nomasignatura']!=""&&$_POST['idasignatura']!=""){

		$sql="update asignaturas set nom_asignatura='".htmlentities($_POST['nomasignatura'])."' where id_asignatura = ".$_POST['idasignatura']."";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-asignaturas?asignatura=".$_POST['idasignatura']."&error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
					alert('El registro se ha modificado correctamente')
					location.href='ver-asignaturas';
				</script>
<?php 
		}

	}else{
		header("location:mod-asignaturas?asignatura=".$_POST['idasignatura']."&error=2");
	}
		
		
	break;

case "pensum":

	if($_POST['gradopensum']!=""&&$_POST['asigpensum']!=""&&$_POST['idpensum']!=""){

		$sql="update pensum set id_asignatura = '".htmlentities($_POST['asigpensum'])."',id_grado='".htmlentities($_POST['gradopensum'])."' where id_pensum = ".$_POST['idpensum']."";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:mod-pensum?pensum=".$_POST['idpensum']."&error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
										alert('El registro se ha agregado correctamente')
										location.href='ver-pensum';
									</script>
<?php 
		}
			
	}else{
		header("location:mod-pensum?pensum=".$_POST['idpensum']."&error=2");
	}

case "institucion" :

	if($_POST['nominst']!=""&&$_POST['nitinst']!=""){

		$sql="update datos_institucionales set nom_institucion='".htmlentities($_POST['nominst'])."',nit_institucion='".htmlentities($_POST['nitinst'])."',dir_institucion='".htmlentities($_POST['dirinst'])."',tel_institucion='".htmlentities($_POST['telinst'])."',mun_institucion='".htmlentities($_POST['muninst'])."',dep_institucion='".htmlentities($_POST['depinst'])."'";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:institucion?error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
						alert('Los datos se han actualizado correctamente')
						location.href='institucion';
					</script>
<?php 
		}
			
	}else{
		header("location:institucion?error=2");
	}
}
?>