<?php
include "validar_session.php";
$title="Reporte de Asistencias - AsistenTIC"; 
include ("header.php");
include ("../conexion.php");
include_once '../clases/database_quering.php';
$db = new DataBase();
?> 
<script src="../js/ajax.js" type="text/javascript"></script>
    <form method="post" action="reportes-asistencias">
	<div class="wrapper">
		<h2 align="center">Reporte de Asistencias</h2> 
        <table align="center">
        <thead>
        <tr><th colspan="2">Elija un Grupo</th></tr>
        </thead>

        <tbody>
        <tr><td>Sede:</td>
        <td><select class="input_full" id="sede" name="sede" onchange="ajax('jorn',sede.value,'jornada.php');" autofocus>                        
                                      <option value="0">Seleccione la sede...</option>
                                      <?php
                            $query = "SELECT * FROM sedes";
                            $db->set_query($query);
                            $db->exec_query("../");
                            $datos = $db->get_values(); 
                            foreach ($datos as $datos){
                                ?>
                                <option value="<?php echo $datos['id_sede'] ?>">
                                    <?php echo html_entity_decode($datos['nom_sede']) ?>
                                </option>
                                <?php
                            }
                            ?>                                    
            </select></td></tr>

        <tr><td>Jornada:</td>
        <td><div id="jorn"><select class="input_full" id="jornada" name="jornada" disabled="disabled">                        
                                      <option value="0">...</option>
                                      </select></div></td></tr>
 
        <tr><td>Grado:</td>
        <td><div id="grad"><select class="input_full" id="grado" name="grado" disabled="disabled">                        
                                      <option value="0">...</option>                                    
            </select></div></td></tr>

        <tr><td>Grupo:</td>
        <td><div id="grup"><select class="input_full" id="grupo" name="grupo" disabled="disabled">                        
                                      <option value="0">...</option>                                    
            </select></div></td></tr>

        <tr><td>Asignatura:</td>
        <td>
        <select class="input_full" id="asignatura" name="asignatura">
        <option value="">Seleccione...</option>
        <?php //Consultamos las asignaturas registradas
$asign = mysql_query("SELECT * FROM asignaturas"); 
while($row = mysql_fetch_array($asign)){ ?>
        <option value="<?php echo $row['id_asignatura'] ?>"><?php echo html_entity_decode($row['nom_asignatura']) ?></option>
        <?php } ?>
        </select></td></tr>

        <tr><td>Mes:</td>
        <td><select class="input_full" id="mes" name="mes">                        
                                      <option value="0">...</option>
                                      <option value="01">Enero</option>
                                      <option value="02">Febrero</option>                                    
                                      <option value="03">Marzo</option>
                                      <option value="04">Abril</option>
                                      <option value="05">Mayo</option>
                                      <option value="06">Junio</option>
                                      <option value="07">Julio</option>
                                      <option value="08">Agosto</option>
                                      <option value="09">Septiembre</option>
                                      <option value="10">Octubre</option>
                                      <option value="11">Noviembre</option>
                                      <option value="12">Diciembre</option>
            </select></td></tr>
        </tbody>

        <tfoot>
        <tr><td align="center" colspan="2"><div id="btnalumno"></div></td></tr>
        <tr><td align="center" colspan="2"><input style="border:medium none;  background:url(../img/back.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="Volver" type="button" id="salir" title="Volver" onclick="window.history.back()" value="" /></td></tr>
        </tfoot>                
        
        </table>
        </div><!--end of wrapper-->
        </form>

<?php 
include ("footer.php");
?>