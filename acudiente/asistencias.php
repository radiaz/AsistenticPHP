<?php
include "validar_session.php";
$alumno=$_GET['id'];
include ("../conexion.php");
//Consultamos el alumno
$query = mysql_query("SELECT * FROM alumnos where id_alumno=".$alumno." "); 
while($row = mysql_fetch_array($query)){	    
$nombre=html_entity_decode($row['prinom_al'])." ".html_entity_decode($row['segnom_al'])." ".html_entity_decode($row['priape_al'])." ".html_entity_decode($row['segape_al']);

$title=$nombre;
include ("header.php");
?> 

	<div class="wrapper">
    
        <form method="POST" action="mod-alumnos" id="alumno" name="alumno">
        <h2 align="center"><?php echo $nombre ?></h2>
        <p align="center"><img src="../alumnos/fotos/<?php echo $row['foto'] ?>" alt="<?php echo $nombre ?>" title="<?php echo $nombre ?>" /></p>        
        <table>
        <thead><tr>
        <th colspan="2">Reporte de Asistencias</th>
        </tr></thead>        
                
        <tbody>
        	<?php //Consultamos las observaciones
$consulta = mysql_query("SELECT * FROM asistencia where id_alumno = ".$alumno." "); 
while($asist = mysql_fetch_array($consulta)){ ?>
                <tr><td colspan="2">
                <label><strong><?php echo $asist['fecha'] ?></strong></label>
                </td></tr>         
				<tr>
					<td><label><strong>
                    <?php //Consultamos el docente
$query = mysql_query("SELECT * FROM asign_academica where id_asignacion = ".$asist['id_asignacion']." ");
while($asign = mysql_fetch_array($query)){
$busq = mysql_query("SELECT * FROM docentes where id_docente = ".$asign['id_docente']." "); 
while($doc = mysql_fetch_array($busq)){
echo html_entity_decode($doc['prinom_doc'])." ".html_entity_decode($doc['segnom_doc'])." ".html_entity_decode($doc['priape_doc'])." ".html_entity_decode($doc['segape_doc']); }?></strong>                    
                    </label></td>
					<td>                    
                    <label>
                    <?php $cons = mysql_query("SELECT * FROM asignaturas where id_asignatura = ".$asign['id_asignatura']." "); 
while($mat = mysql_fetch_array($cons)){
echo html_entity_decode($mat['nom_asignatura']); ?>                    
                    </label>
                    <label>
                    <?php if($asist['asistencia']==1){echo '<img style="margin-bottom :0;" alt="asistio" title="Asisti&oacute" src="../img/check.png" width="20" height="20">';}else {echo '<img style="margin-bottom :0;" alt="asistio" title="No asisti&oacute" src="../img/cancelar.png" width="20" height="20">';} }?>
                    </label>                    
                    </td>
				</tr>
			<?php } } ?>	
			</tbody>    
        <tfoot><tr>
        <td align="center" colspan="2">           
        <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />                       
        </td></tr>        
        </tfoot>
        </table>
        </form>
	
        </div><!--end of wrapper-->

<?php
}
include ("footer.php");
?>