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
        <th colspan="2">Reporte de Observaciones</th>
        </tr></thead>        
                
        <tbody>
        	<?php //Consultamos las observaciones
$consulta = mysql_query("SELECT * FROM observaciones where id_alumno = ".$alumno." "); 
while($obs = mysql_fetch_array($consulta)){ ?>
                <tr><td colspan="2">
                <label><strong><?php echo $obs['fecha'] ?></strong></label>
                </td></tr>         
				<tr>
					<td><label><strong>
                    <?php //Consultamos el docente
$query = mysql_query("SELECT * FROM docentes where id_docente = ".$obs['id_docente']." "); 
while($doc = mysql_fetch_array($query)){
	echo html_entity_decode($doc['prinom_doc'])." ".html_entity_decode($doc['segnom_doc'])." ".html_entity_decode($doc['priape_doc'])." ".html_entity_decode($doc['segape_doc']); }?></strong>                    
                    </label></td>
					<td>                    
                    <p align="justify"><?php echo $obs['observacion'] ?></p>                    
                    </td>
				</tr>
			<?php } ?>	
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