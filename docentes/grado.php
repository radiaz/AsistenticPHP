<?php
include "validar_session.php";
include("../conexion.php");

$sql="select * from grados"; 
$resultado=mysql_query($sql,$link);
if($_POST['cod']!="0"){
echo ""?><select class="input_full" name="grado" id="grado" onchange="ajax('grup',grado.value,'grupo.php');">
<option value="0" selected="selected">Seleccione el grado...</option><?php "";
while ($row = mysql_fetch_assoc($resultado)){
   	echo"<option value='".$row['id_grado']."' >".html_entity_decode($row['nom_grado'])."</option>";
    }
	echo "</select>";
}else{
	echo"<select class='input_full' name='grado' id='grado' disabled='disabled'>
    <option value='0' selected='selected'>...</option>
	</select>";
	}	
?>