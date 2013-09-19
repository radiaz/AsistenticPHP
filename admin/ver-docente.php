<?php
include "validar_session.php";
$docente=$_GET['id'];
include ("../conexion.php");
//Consultamos el docente
$query = mysql_query("SELECT * FROM docentes where id_docente=".$docente." "); 
while($row = mysql_fetch_array($query)){	    
$nombre=html_entity_decode($row['prinom_doc'])." ".html_entity_decode($row['segnom_doc'])." ".html_entity_decode($row['priape_doc'])." ".html_entity_decode($row['segape_doc']);

$title=$nombre;
include ("header.php");
?> 

	<div class="wrapper">    
        
        <h2 align="center">Informaci&oacute;n del Docente</h2>                
        <table>
        <thead><tr>
        <th colspan="2">Datos Personales</th>
        </tr></thead>        
                
        <tbody>
				<tr>
					<td><label><strong>Nombre:</strong></label></td>
					<td><label><?php echo $nombre ?></label></td>
				</tr>
				<!-- <tr>
					<td><label><strong><?php echo $row['tipo_docu_al'] ?></strong></label></td>
					<td><label><?php echo $row['num_docu_al'] ?></td>
				</tr> -->				
				<tr>
					<td><label><strong>Correo:</strong></label></td>
					<td><label><?php echo $row['email_doc'] ?></td>
				</tr>
                <tr>
					<td><label><strong>Asignaturas:</strong></label></td>
					<td>
                    <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM asign_academica where id_docente = ".$row['id_docente']." group by id_asignatura"); 
while($asign = mysql_fetch_array($query)){ 
$consulta = mysql_query("SELECT * FROM asignaturas where id_asignatura = ".$asign['id_asignatura']." "); 
while($mat = mysql_fetch_array($consulta)){	
					?>
                    <label>&#8226; <?php echo html_entity_decode($mat['nom_asignatura']) ?></label><br />
                    <?php } } ?>
                    </td>
				</tr>				
			</tbody>    
        <tfoot><tr>
        <td align="center" colspan="2">                   
          <input style="border:medium none;	background:url(../img/modify.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Modificar" type="button" onclick="window.location='mod-docentes?id=<?php echo $docente ?>'" id="Modificar" title="Modificar" value="" />
          &nbsp;&nbsp;&nbsp;
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />                       
        </td></tr>        
        </tfoot>
        </table>        
	
        </div><!--end of wrapper-->

<?php
}
include ("footer.php");
?>