<?php
if (isset($_POST['rol'])){
	if ($_POST['usuario']!=""&&$_POST['password']!=""&&$_POST['rol']!=0){

		//llamada de la clase para limpiar los datos que llegan como nombre de usuario y password de caracteres especiales
		include_once "clases/funciones.php";
		$c = new funciones();

		 $usuario = $_POST['usuario'];
		 
		$c->set_dato_limpio($_POST['password']);
		$password=$c->get_dato_limpio();

		//encriptacion de la conraseña
		$c->set_dato_encriptada($password);
		$password=$c->get_dato_encriptado();

		switch ($_POST['rol']){
			case ("1") :
				/**
				 * Inicio de session del usuario administrador
				 */
				//llamada clase de manejo de la base de datos
				include 'clases/database_quering.php';
				$db = new DataBase();
					
				$db->set_query('select id_docente,prinom_doc,segnom_doc,priape_doc,segape_doc from docentes where email_doc="'.$usuario.'" and pass_doc="'.$password.'" and admin = 1');
				$db->exec_query("");
				$r=$db->get_values();
				
				if ($r[0][0]!="empty") {

				 $c->create_session($r[0]['prinom_doc'], $r[0]['segnom_doc'], $r[0]['priape_doc'], $r[0]['segape_doc'], $r[0]['id_docente'], "admin");
				 header("location:admin/");

				}else{

					header("location:acceso?error=2");

				}

				break;
			case ("2") :
				/**
				 * Inicio de session del usuario padre de familia
				 */
				//llamada clase de manejo de la base de datos
				include 'clases/database_quering.php';
				$db = new DataBase();
					
				$db->set_query('select id_acudiente,prinom_acu,segnom_acu,priape_acu,segape_acu,email from acudiente where num_docu_acu="'.$usuario.'" and pass_acu="'.$password.'"');
				$db->exec_query("");
				$r=$db->get_values();
				if ($r[0][0]!="empty") {
				
					$c->create_session($r[0]['prinom_acu'], $r[0]['segnom_acu'], $r[0]['priape_acu'], $r[0]['segape_acu'], $r[0]['id_acudiente'], "acudiente");
					header("location:acudiente/");
				
				}else{
				
					header("location:acceso?error=2");
				
				}
				
				
				
				break;
			case ("3") :
				/**
				 * Inicio de session del usuario docente
				 */
				//llamada clase de manejo de la base de datos
				include 'clases/database_quering.php';
				$db = new DataBase();
					
				$db->set_query('select id_docente,prinom_doc,segnom_doc,priape_doc,segape_doc from docentes where email_doc="'.$usuario.'" and pass_doc="'.$password.'"');
				$db->exec_query("");
				$r=$db->get_values();
				if ($r[0][0]!="empty") {
				
					$c->create_session($r[0]['prinom_doc'], $r[0]['segnom_doc'], $r[0]['priape_doc'], $r[0]['segape_doc'], $r[0]['id_docente'], "docente");
					header("location:docente");
				
				}else{
				
					header("location:acceso?error=2");
				
				}
				


				break;
		}



	}else{
		header("location:acceso?error=1");


	}




}else{

	header("location:404");

}
?>