<?php
include "validar_session.php";
include("../conexion.php");

$sql="select * from jornadas"; 
$resultado=mysql_query($sql,$link);
if($_POST['cod']!="0"){
echo""?><select class="input_full" name="jornada" id="jornada" onchange="ajax('grad',jornada.value,'grado.php');">
<option value="0" selected="selected">Seleccione la jornada...</option><?php "";
while ($row = mysql_fetch_assoc($resultado)){
   	echo"<option value='".$row['id_jornada']."' >".html_entity_decode($row['nom_jornada'])."</option>";
    }
	echo "</select>";
}else{
	echo""?><select class="input_full" name="jornada" id="jornada" disabled="disabled" autofocus="autofocus" onblur="ajax('grad',0,'grado.php');">
    <option value="0" selected="selected">...</option>
	</select><?php "";
	}	
?>