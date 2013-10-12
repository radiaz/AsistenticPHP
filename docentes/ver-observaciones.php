<?php
include "validar_session.php";
$title="Observaciones de alumnos - AsistenTIC"; 
include ("header.php");
include_once '../clases/database_quering.php';
$db = new DataBase();
?> 
<script src="../js/ajax.js" type="text/javascript"></script>
    <form method="post" action="reportes-observaciones">
	<div class="wrapper">
		<h2 align="center">Reporte de Observaciones</h2> 
        <table align="center">
        <thead>
        <tr><th colspan="2">Elija un alumno</th></tr>
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

        <tr><td>Alumnos:</td>
        <td><div id="alum"><select class="input_full" id="alumno" name="alumno" disabled="disabled">                        
                                      <option value="0">...</option>                                    
            </select></div></td></tr>

        <tr><td>Mes:</td>
        <td><div id="alum"><select class="input_full" id="mes" name="mes">                        
                                      <option value="0">...</option>
                                      <option value="1">Enero</option>
                                      <option value="2">Febrero</option>                                    
                                      <option value="3">Marzo</option>
                                      <option value="4">Abril</option>
                                      <option value="5">Mayo</option>
                                      <option value="6">Junio</option>
                                      <option value="7">Julio</option>
                                      <option value="8">Agosto</option>
                                      <option value="9">Septiembre</option>
                                      <option value="10">Octubre</option>
                                      <option value="11">Noviembre</option>
                                      <option value="12">Diciembre</option>
            </select></div></td></tr>
        </tbody>

        <tfoot>
        <tr><td align="center" colspan="2"><div id="btnalumno"></div></td></tr>
        </tfoot>                
        
        </table>
        </div><!--end of wrapper-->
        </form>

<?php 
include ("footer.php");
?>