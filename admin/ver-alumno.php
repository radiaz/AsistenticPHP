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
        
        <h2 align="center"><?php echo $nombre ?></h2>
        <p align="center"><img src="../alumnos/fotos/<?php echo $row['foto'] ?>" alt="<?php echo $nombre ?>" title="<?php echo $nombre ?>" /></p>        
        <table>
        <thead><tr>
        <th colspan="2">Datos Personales</th>
        </tr></thead>        
                
        <tbody>
				<tr>
					<td><label><strong>Nombre:</strong></label></td>
					<td><label><?php echo $nombre ?></label></td>
				</tr>
				<tr>
					<td><label><strong><?php echo $row['tipo_docu_al'] ?></strong></label></td>
					<td><label><?php echo $row['num_docu_al'] ?></td>
				</tr>				
				<tr>
					<td><label><strong>Fecha de Nacimiento:</strong></label></td>
					<td><label><?php echo $row['fech_nac'] ?></td>
				</tr>
                <tr>
					<td><label><strong>Grupo:</strong></label></td>
					<td>
                    <?php //Consultamos los datos de la institucion
$query = mysql_query("SELECT * FROM grupos where id_grupo = ".$row['id_grupo']." "); 
while($grp = mysql_fetch_array($query)){ ?>
                    <label><?php echo $grp['nom_grupo'] ?></label>
                    <?php } ?>
                    </td>
				</tr>
				<tr>
					<td><label><strong>RH:</strong></label></td>
					<td><label><?php echo $row['rh'] ?></td>
				</tr>
				<tr>
					<td><label><strong>EPS:</strong></label></td>
					<td><label><?php echo $row['seguridad_social'] ?></td>
				</tr>
			</tbody>    
        <tfoot><tr>
        <td align="center" colspan="2">
           <input style="border:medium none;	background:url(../img/lupa.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="ver" type="button" onclick="window.location='obs-alumno?id=<?php echo $alumno ?>'" id="ver" title="Ver Observaciones" value="" />
          &nbsp;&nbsp;&nbsp;        
          <input style="border:medium none;	background:url(../img/modify.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Modificar" type="button" onclick="window.location='mod-alumnos?id=<?php echo $alumno ?>'" id="Modificar" title="Modificar" value="" />
          &nbsp;&nbsp;&nbsp;
          <input style="border:medium none;	background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" />
        <br /><a href="../alumnos/observacion?id=<?php echo $alumno ?>" class="button">+ Agregar Observaci&oacute;n</a>               
        </td></tr>        
        </tfoot>
        </table>        
	
        </div><!--end of wrapper-->

<?php
}
include ("footer.php");
?>