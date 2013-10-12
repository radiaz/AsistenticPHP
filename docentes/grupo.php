<?php
include "validar_session.php";
include("../conexion.php");

$sql="select * from grupos where id_grado='".$_POST['cod']."' "; 
$resultado=mysql_query($sql,$link);
if($_POST['cod']!="0"){
echo""?><select required class="input_full" name="grupo" id="grupo" onchange="ajax('alum',grupo.value,'alumno.php');">
<option value="" selected="selected">Seleccione el grupo...</option><?php "";
while ($row = mysql_fetch_assoc($resultado)){
   	echo"<option value='".$row['id_grupo']."' >".$row['nom_grupo']."</option>";
    }
	echo "</select>";
}else{
	echo""?><select required class="input_full" name="grupo" id="grupo" disabled="disabled">
    <option value="" selected="selected">...</option>
	</select><?php "";
	}	
?>