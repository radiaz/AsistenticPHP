<?php
$title="Contacto - AsistenTIC";
include ("header.php");
?>   

<!--=========================================  Left content, address =============================================================-->    
     <div class="wrapper">
    
    		<div class="grids top">

                <div class="grid-6 grid">
                            <h2>Direcci&oacute;n</h2>
                             <div>   
                                <p class="bottom">
                                ITFIP - Instituci&oacute;n de Educaci&oacute;n Superior<br />
                                Semillero GRIDSOA<br />                            
                                Espinal (Tolima)<br />
                                Colombia<br /><br />
                                Tel&eacute;fono: 123 456 789<br />
                                Fax: 123 456 789 - 11<br />
                                Email: contacto@asistentic.com
                              </p>
                             </div>            
                                                             
						</div> 		
                
<!--=================================  Contact form ===============================================================-->                 
                  
                  <div class="grid-10 grid">
                           <h2>Formulario de Contacto</h2>

					<!--An example for a contact form from formalize.me, table in use.</h6>-->
                                  
                       <form  action="#" method="post" enctype="multipart/form-data" onsubmit="return false">
                              <table class="form">
                                <tr>
                                  <th>
                                    <label for="name">
                                      Nombre
                                    </label>
                                  </th>
                                  <td>
                                    <input class="input_full" type="text" id="name" name="name" required />
                        
                                  </td>
                                </tr>
                                <tr>
                                  <th>
                                    <label for="email">
                                      Email
                                    </label>
                                  </th>
                                  <td>
                        
                                    <input class="input_full" type="email" id="email" name="email" required />
                                  </td>
                                </tr>
                               
                                <tr>
                        
                                  <th>
                                    <label for="tel">
                                      Tel&eacute;fono
                                    </label>
                                  </th>
                                  <td>
                                    <input class="input_full" type="tel" id="tel" name="tel" required />
                                  </td>
                                </tr>
                        
                                <tr>
                                  <th>
                                    <label for="url">
                                      Sitio web
                                    </label>
                                  </th>
                                  <td>
                                    <input class="input_full" type="text" id="url" name="url" placeholder="http://" />
                                  </td>
                        
                                </tr>
                                <tr>
                                  <th>
                                    <label for="subject">
                                      Asunto
                                    </label>
                                  </th>
                                  <td>
                                    <select class="input_full" id="subject" name="subject">
                        
                                      <option value="">Seleccione el asunto...</option>
                                      
                                        <option value="1k_2k">Consulta</option>
                                        <option value="2k_3k">Proyecto</option>
                                        <option value="3k_4k">Feedback</option>
                                        <option value="4k_5k">Otro</option>
                        
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                        
                                  <th>
                                    <label for="priority_normal">
                                      Prioridad
                                    </label>
                                  </th>
                                  <td>
                                    <input type="radio" name="priority" id="priority_urgent" value="Urgent">
                                    <label for="priority_urgent">
                                      Urgente
                                    </label>
                        
                                    &nbsp;
                                    &nbsp;
                                    <input type="radio" name="priority" id="priority_normal" value="Normal" checked="checked">
                                    <label for="priority_normal">
                                      Normal
                                    </label>
                                    &nbsp;
                                    &nbsp;
                                    <input type="radio" name="priority" id="priority_low" value="Low">
                        
                                    <label for="priority_low">
                                      Baja
                                    </label>
                                  </td>
                                </tr>
                                <tr>
                                  <th>
                        
                                    <label for="description">
                                      Mensaje
                                    </label>
                                  </th>
                                  <td>
                                    <textarea id="description" name="description" rows="8" required placeholder="Por favor escriba su mensaje aqu&iacute;."></textarea>
                                  </td>
                        
                                </tr>
                                 <tr>
                                  <th>
                                    <label for="cc">
                                      <abbr title="Courtesy Copy">CC</abbr>
                                    </label>
                        
                                  </th>
                                  <td>
                                    <input type="checkbox" id="cc" name="cc" value="1" />
                                    <label for="cc">
                                      Enviar una copia a mi correo
                                    </label>
                                  </td>
                                </tr>
                              </table>
                        
                              <p>
                                <input type="submit" value="Enviar" class="float_left" />
                                <input type="reset" value="Limpiar" class="float_right">
                              </p>
                            </form>                       
                                                      
                </div><!--end of grid-10--> 
			</div><!--end of grids-->
           
	</div><!--end of wrapper-->
    
<?php 
include ("footer.php");
?>