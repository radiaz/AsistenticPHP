<?php
include "validar_session.php";
$title="Gesti&oacute;n de alumnos - AsistenTIC"; 
include ("header.php");
include_once '../clases/database_quering.php';
$db = new DataBase();
?> 
<script src="../js/ajax.js" type="text/javascript"></script>
 
	<div class="wrapper">
		<h2 align="center">Listado de Alumnos</h2> 
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
        </tbody>

        <tfoot>
        <tr><td align="center" colspan="2"><div id="btnalumno"></div></td></tr>
        </tfoot>                
        
        </table>
        
        <p align="center"><a class="button" href="add-alumnos">+ Agregar Alumno</a></p>
	
        </div><!--end of wrapper-->

<?php 
include ("footer.php");
?>