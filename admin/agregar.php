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


$Agregar=$_POST['add'];


switch ($Agregar){
	
	case "alumno":
		
		//Validamos que no hayan campos vacios para hacer el Insert
		if($_POST['pnombre'] != "" && $_POST['papellido'] != "" && $_POST['tdocumento'] != "" && $_POST['ndocumento'] != "" && $_POST['fnacimiento'] != "" && $_POST['grupo'] != "" && $_POST['ndocumento_ac'] != "" && $_POST['rh'] != "" && $_POST['sexo'] != "" && $_POST['pnombre_ac'] != "" && $_POST['papellido_ac'] != "" && $_POST['tdocumento_ac'] != "" &&  $_POST['telefono_ac'] != "" && $_POST['direccion_ac'] != ""){
			
		if ($_FILES['foto']['error']==0){
		if (($_FILES['foto']['type']=="image/jpeg"||$_FILES['foto']['type']=="image/pjpeg"||$_FILES['foto']['type']=="image/png")&&$_FILES['foto']['size']<200000){
		    
			$tamano = $_FILES["foto"]['size'];
			$tipo = $_FILES["foto"]['type'];
			if ($_FILES['foto']['type']=="image/jpeg"||$_FILES['foto']['type']=="image/pjpeg"){
			
				$archivo = $_POST['ndocumento'].".jpg";
			
			}
			
			if ($_FILES['foto']['type']=="image/png"){
					
				$archivo = $_POST['ndocumento'].".png";
					
			}
			$prefijo = substr(md5(uniqid(rand())),0,6);
			$ubicacion = $prefijo."_".$archivo;
			$destino =  "../alumnos/fotos/".$ubicacion;
		    $temp=$_FILES['foto']['tmp_name'];
		    copy($temp,$destino);
		}else{
			
			header("location:add-alumnos?error=3");
			
			
		}
		}else{
			
			$ubicacion=null;
			
		}
			
		
			
			$sql="insert into alumnos (prinom_al, segnom_al, priape_al, segape_al, tipo_docu_al, num_docu_al, fech_nac, id_grupo, num_id_acudiente, rh, seguridad_social, sexo,foto) 
			values ('".htmlentities($_POST['pnombre'])."', '".htmlentities($_POST['snombre'])."', '".htmlentities($_POST['papellido'])."', '".htmlentities($_POST['sapellido'])."',
			'".$_POST['tdocumento']."', '".$_POST['ndocumento']."', '".$_POST['fnacimiento']."', '".$_POST['grupo']."', '".$_POST['ndocumento_ac']."', '".$_POST['rh']."', 
			'".htmlentities($_POST['ssocial'])."', '".$_POST['sexo']."','".$ubicacion."');";
			//Guardamos el sql
			$db->set_query($sql);
			//Ejecutamos la query
			$db->exec_query("../");
			//Recuperamos el dato de las filas afectadas
			$resultado=$db->get_num_rows();
			if ($resultado==0){
				header("location:add-alumnos?error=1");
			}else{
				$f->set_dato_encriptada($_POST['ndocumento_ac']);
				$password_acu=$f->get_dato_encriptado();
				//mando la query del acudiente
				$sql="insert into acudiente (prinom_acu, segnom_acu, priape_acu, segape_acu, tipo_docu_acu, num_docu_acu, telefono, direccion, email, pass_acu) values ('".htmlentities($_POST['pnombre_ac'])."', '".htmlentities($_POST['snombre_ac'])."', '".htmlentities($_POST['papellido_ac'])."', '".htmlentities($_POST['sapellido_ac'])."', '".$_POST['tdocumento_ac']."', '".$_POST['ndocumento_ac']."', '".$_POST['telefono_ac']."', '".$_POST['direccion_ac']."', '".$_POST['email_ac']."', '".$password_acu."');";
				$db->set_query($sql);
				//envio la ruta
				$db->exec_query("../");
				if ($_POST['email_ac']!=""){
					
					$para = $_POST['email_ac'];
					$asunto = "Datos de acceso al Sistema AsistenTIC";
					
					$mensaje = "\r\nDatos de acceso al sistema AsistenTIC:\r\n";
					$mensaje .= "\r\nUsuario: " . $_POST['email_ac'] . " \r\n";
					$mensaje .= "Clave: " . $_POST['ndocumento_ac']. " \r\n";
					$mensaje .= "\r\nPara acceder debe ingresar a www.asistentic.com/acceso";
					
					$f->set_mailto($para, $asunto, $mensaje);
					$f->mailto();
					
				}
				?>
<script language='javascript'>
	alert('El registro se ha agregado correctamente')
	location.href='add-alumnos';
</script>
<?php
			}
		}else{
			header("location:add-alumnos?error=2");
		}
		break;

case "docente":

	//Validamos que no hayan campos vacios para hacer el Insert
	if($_POST['pnombre_doc'] != "" && $_POST['papellido_doc'] != "" && $_POST['email_doc'] != ""){
		$sql="insert into docentes (prinom_doc, segnom_doc, priape_doc, segape_doc, email_doc, pass_doc, admin) values ('".htmlentities($_POST['pnombre_doc'])."', '".htmlentities($_POST['snombre_doc'])."', '".htmlentities($_POST['papellido_doc'])."', '".htmlentities($_POST['sapellido_doc'])."', '".$_POST['email_doc']."', '".$password."', '".$_POST['admin']."');";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:add-docentes?error=1");
		}else{
			//Enviamos un correo con los datos de acceso al sistema

			$para = $_POST['email_doc'];
			$asunto = "Datos de acceso al Sistema AsistenTIC";

			$mensaje = "\r\nDatos de acceso al sistema AsistenTIC:\r\n";
			$mensaje .= "\r\nUsuario: " . $_POST['email_doc'] . " \r\n";
			$mensaje .= "Clave: " . $pass . " \r\n";
			$mensaje .= "\r\nPara acceder debe ingresar a www.asistentic.com/acceso";

			$f->set_mailto($para, $asunto, $mensaje);
			$f->mailto();

			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
	alert('El registro se ha agregado correctamente. Se ha enviado un mensaje con los datos de acceso al sistema')
	location.href='add-docentes';
</script>
<?php
		}
	}else{
		header("location:add-docentes?error=2");
	}
	break;

case "sede":

	if($_POST['nomsede']!=""){

		$sql="insert into sedes (nom_sede) values ('".htmlentities($_POST['nomsede'])."');";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:add-sedes?error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
	alert('El registro se ha agregado correctamente')
	location.href='add-sedes';
</script>
<?php 
		}

	}else{
		header("location:add-sedes?error=2");
	}

	break;

case "jornada":

	if($_POST['nomjornada']!=""){

		$sql="insert into jornadas (nom_jornada) values ('".htmlentities($_POST['nomjornada'])."');";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:add-jornadas?error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
		alert('El registro se ha agregado correctamente')
		location.href='add-jornadas';
	</script>
<?php 
		}

	}else{
		header("location:add-jornadas?error=2");
	}

	break;

case "grado":

	if($_POST['nomgrado']!=""){

		$sql="insert into grados (nom_grado) values ('".htmlentities($_POST['nomgrado'])."');";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:add-grados?error=1");
		}else{
			?>
<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
<script language='javascript'>
				alert('El registro se ha agregado correctamente')
				location.href='add-grados';
			</script>
<?php 
		}
			
	}else{
		header("location:add-grados?error=2");
	}

	break;
	
	case "grupo":
	
		if($_POST['nomgrupo']!=""&&$_POST['sedegrupo']!=""&&$_POST['jorgrupo']!=""&&$_POST['gragrupo']!=""&&$_POST['dirgrupo']!=""){
	
			$sql="insert into grupos (nom_grupo,id_sede,id_jornada,id_grado,id_director) values ('".htmlentities($_POST['nomgrupo'])."','".htmlentities($_POST['sedegrupo'])."','".htmlentities($_POST['jorgrupo'])."','".htmlentities($_POST['gragrupo'])."','".htmlentities($_POST['dirgrupo'])."');";
			//Guardamos el sql
			$db->set_query($sql);
			//Ejecutamos la query
			$db->exec_query("../");
			//Recuperamos el dato de las filas afectadas
			$resultado=$db->get_num_rows();
			if ($resultado==0){
				header("location:add-grupos?error=1");
			}else{
				?>
	<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
	<script language='javascript'>
					alert('El registro se ha agregado correctamente')
					location.href='add-grupos';
				</script>
	<?php 
			}
				
		}else{
			header("location:add-grupos?error=2");
		}
	
		break;
		
		case "pensum":
		
			if($_POST['gradopensum']!=""&&$_POST['asigpensum']!=""){
		
				$sql="insert into pensum (id_asignatura,id_grado) values ('".htmlentities($_POST['asigpensum'])."','".htmlentities($_POST['gradopensum'])."');";
				//Guardamos el sql
				$db->set_query($sql);
				//Ejecutamos la query
				$db->exec_query("../");
				//Recuperamos el dato de las filas afectadas
				$resultado=$db->get_num_rows();
				if ($resultado==0){
					header("location:add-pensum?error=1");
				}else{
					?>
		<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
		<script language='javascript'>
						alert('El registro se ha agregado correctamente')
						location.href='add-pensum';
					</script>
		<?php 
				}
					
			}else{
				header("location:add-pensum?error=2");
			}
		
			break;
	
	case "asignacion":
	
		if($_POST['grupoasignacion']!=""&&$_POST['docasignacion']!=""&&$_POST['matasignacion']!=""){
			if($_POST['dlunes']=="on"){
				$dlunes=1;
			}else{
				
				$dlunes=0;
			}
			if($_POST['dmartes']=="on"){
				$dmartes=1;
			}else{
				$dmartes=0;
			}
			if($_POST['dmiercoles']=="on"){
				$dmiercoles=1;
			}else{
				$dmiercoles=0;
			}
			if($_POST['djueves']=="on"){
				$djueves=1;
			}else{
				$djueves=0;
			}
			if($_POST['dviernes']=="on"){
				$dviernes=1;
			}else{
				$dviernes=0;
			}
			if($_POST['dsabado']=="on"){
				$dsabado=1;
			}else{
				$dsabado=0;
			}
				
			
			
	
			$sql="insert into asign_academica (id_grupo,id_docente,id_asignatura,lunes,hora_inicio_lunes,hora_fin_lunes,
			martes,hora_inicio_martes,hora_fin_martes,miercoles,hora_inicio_miercoles,hora_fin_miercoles,
			jueves,hora_inicio_jueves,hora_fin_jueves,viernes,hora_inicio_viernes,hora_fin_viernes,sabado,hora_inicio_sabado,hora_fin_sabado) 
			values ('".htmlentities($_POST['grupoasignacion'])."','".htmlentities($_POST['docasignacion'])."'
			,'".htmlentities($_POST['matasignacion'])."'
			,".$dlunes.",'".htmlentities($_POST['hilunes'])."','".htmlentities($_POST['hflunes'])."'
			,".$dmartes.",'".htmlentities($_POST['himartes'])."','".htmlentities($_POST['hfmartes'])."'
			,".$dmiercoles.",'".htmlentities($_POST['himiercoles'])."','".htmlentities($_POST['hfmiercoles'])."'
			,".$djueves.",'".htmlentities($_POST['hijueves'])."','".htmlentities($_POST['hfjueves'])."'
			,".$dviernes.",'".htmlentities($_POST['hiviernes'])."','".htmlentities($_POST['hfviernes'])."'
			,".$dsabado.",'".htmlentities($_POST['hisabado'])."','".htmlentities($_POST['hfsabado'])."');";
			//Guardamos el sql
			$db->set_query($sql);
			//Ejecutamos la query
			$db->exec_query("../");
			//Recuperamos el dato de las filas afectadas
			$resultado=$db->get_num_rows();
			if ($resultado==0){
				header("location:add-asignacion?error=1");
			}else{
				?>
	<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
	<script language='javascript'>
					alert('El registro se ha agregado correctamente')
					location.href='add-asignacion';
				</script>
	<?php 
			}
				
		}else{
			header("location:add-asignacion?error=2");
		}
	
		break;
		
		case "asignatura":
		
			if($_POST['nomasignatura']!=""){
		
				$sql="insert into asignaturas (nom_asignatura) values ('".htmlentities($_POST['nomasignatura'])."');";
				//Guardamos el sql
				$db->set_query($sql);
				//Ejecutamos la query
				$db->exec_query("../");
				//Recuperamos el dato de las filas afectadas
				$resultado=$db->get_num_rows();
				if ($resultado==0){
					header("location:add-asignaturas?error=1");
				}else{
					?>
		<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
		<script language='javascript'>
						alert('El registro se ha agregado correctamente')
						location.href='add-asignaturas';
					</script>
		<?php 
				}
					
			}else{
				header("location:add-asignaturas?error=2");
			}
		
			break;
			
			case "observacion_admin":
			
				if($_POST['id']!=""&&$_POST['nota']!=""){
			        $hora=$f->get_hora();
			        $fecha=$f->get_fecha();
					
					$sql="insert into observacion (id_alumno,id_docente,fecha,observacion) values ('".htmlentities($_POST['id'])."','".htmlentities($_SESSION['id'])."','".$fecha." ".$hora."','".htmlentities($_POST['nota'])."');";
					//Guardamos el sql
					$db->set_query($sql);
					//Ejecutamos la query
					$db->exec_query("../");
					//Recuperamos el dato de las filas afectadas
					$resultado=$db->get_num_rows();
					if ($resultado==0){
						header("location:add-observacion?error=1");
					}else{
						?>
					<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
					<script language='javascript'>
									alert('El registro se ha agregado correctamente')
									location.href='add-observacion';
								</script>
					<?php 
							}
								
						}else{
							header("location:add-observacion?error=2");
						}
					
						break;
						
						case "observacion":
								
							if($_POST['id']!=""&&$_POST['nota']!=""){
								$hora=$f->get_hora();
								$fecha=$f->get_fecha();
									
								$sql="insert into observaciones (id_alumno,id_docente,fecha,observacion) values ('".htmlentities($_POST['id'])."','".htmlentities($_SESSION['id'])."','".$fecha." ".$hora."','".htmlentities($_POST['nota'])."');";
								//Guardamos el sql
								$db->set_query($sql);
								//Ejecutamos la query
								$db->exec_query("../");
								//Recuperamos el dato de las filas afectadas
								$resultado=$db->get_num_rows();
								if ($resultado==0){
									header("location:../alumnos/observacion?id=".$_POST['id']."&error=1");
								}else{
									?>
											<!-- Enviamos el mensaje de confirmacion de registro de usuario y direccionamos al formulario nuevamente -->
											<script language='javascript'>
															alert('El registro se ha agregado correctamente')
															location.href='../alumnos/dmVyYWx1bW5v?id=<?php echo $_POST['id']; ?>';
														</script>
											<?php 
													}
														
												}else{
													header("location:../alumnos/observacion?id=".$_POST['id']."&error=2");
												}
											
												break;
												

}
?>