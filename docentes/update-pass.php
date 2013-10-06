<?php
include "validar_session.php";
//incluyo el archivo de la clase
include_once '../clases/database_quering.php';
include_once '../clases/funciones.php';
//creo una instancia de la clase funciones
$db = new DataBase();
$f =  new funciones();

$password = $_POST['clave'];

$f->set_dato_encriptada($password);
$passencrypt=$f->get_dato_encriptado();
$idoc = $_SESSION['id'];

//Validamos que las contrasenas coincidan
	if($_POST['clave'] == $_POST['rclave']){
		$sql="UPDATE docentes SET pass_doc = '".$passencrypt."' WHERE id_docente = '".$idoc."' ";
		//Guardamos el sql
		$db->set_query($sql);
		//Ejecutamos la query
		$db->exec_query("../");
		//Recuperamos el dato de las filas afectadas
		$resultado=$db->get_num_rows();
		if ($resultado==0){
			header("location:password?error=1");
		}else{			
		?>
<!-- Enviamos el mensaje de confirmacion de cambio de contrasena -->
<script language='javascript'>
	alert('Su contrasena ha sido actualizada correctamente.')
	location.href='perfil';
</script>
<?php
	}	
	}else{
		header("location:password?error=2");
	}
?>