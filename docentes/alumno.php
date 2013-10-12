<?php
include "validar_session.php";
include '../clases/database_quering.php';
$db = new DataBase();
$sql="select * from alumnos where id_grupo='".$_POST['cod']."' ";
$db->set_query($sql); 
$db->exec_query("../");
$datos=$db->get_values();
if($_POST['cod']!=""){
echo""?><select class="input_full" name="alumno" id="alumno" onchange="ajax('btnalumno',alumno.value,'boton-alumno.php');">
<option value="" selected="selected">Seleccione el alumno...</option><?php "";
foreach($datos as $datos){
   	echo"<option value='".$datos['id_alumno']."' >".html_entity_decode($datos['prinom_al'])." ".html_entity_decode($datos['segnom_al'])." ".html_entity_decode($datos['priape_al'])." ".html_entity_decode($datos['segape_al'])."</option>";
    }
	echo "</select>";
}else{
	echo""?><select class="input_full" name="alumno" id="alumno" disabled="disabled">
    <option value="" selected="selected">...</option>
	</select><?php "";
	}	
?>