<?php
$title="Acceso a usuarios - AsistenTIC";
include ("header.php");
?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#acceso").validate({
		rules: {
			rol: { required:true},
			usuario: { required: true},			
			password: {required: true},
		},
		messages: {
			rol: "Seleccione un rol",
			usuario: "Campo obligatorio (*)",			
			password: "Campo obligatorio (*)",
		}
	});
});
</script>

<div class="wrapper">
<form action="inicio-seguro.php" method="post" name="acceso" id="acceso">

  <table align="center">
      <thead>       
        <tr>
          <th colspan="3" align="center" scope="col">Autenticaci&oacute;n de Usuarios</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td rowspan="3" align="center"><img src="img/lock.png" /></td>
          <td>Rol (*):</td>
          <td>
          <select required class="input_full" id="rol" name="rol" autofocus>                        
                                      <option value="">Seleccione tipo de usuario...</option>                                      
                                      <option value="3">Docente</option>
                                      <option value="2">Padre de Familia</option>
                                      <option value="1">Administrador</option>
          </select>
          </td>
        </tr>

        <tr>
          <td>Usuario (*):</td>
          <td><input class="input_full" name="usuario" type="text" id="usuario" maxlength="50" tabindex="2" required /></td>
        </tr>

        <tr>
          <td>Contrase&ntilde;a (*):</td>
          <td><input class="input_full" name="password" type="password" id="pasword" maxlength="20" tabindex="3" required/></td>           
        </tr>
        
        <tr>
          <td colspan="3" align="center">
          <?php if (isset($_GET['error'])){
switch ($_GET['error']){
		case ("1"):
			echo '<label id="menerr">Por favor diligencie los datos obligatorios (*)</label><br />';
			break;
                case ("2"):
			echo '<label id="menerr">Usuario o contrase&ntilde;a incorrectos</label><br />';
			break;}
}?>
          <input style="border:medium none;	background:url(img/aceptar.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="enviar" type="submit" id="enviar" tabindex="3"  title="Aceptar" value="" />
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input style="border:medium none;	background:url(img/cancelar.png) no-repeat center center; height:64px; width:64px; cursor:pointer;" name="salir" type="button" id="salir" title="Cancelar" tabindex="5" onclick="window.location='/'" value="" />
          </td>
        </tr>
     </tbody>           
     <tfoot>
          <tr>
          <td colspan="3" align="center"><a href="javascript:recupera()" tabindex="6" style="color: #218B53">He olvidado la contrase&ntilde;a</a></td>
         </tr>
     </tfoot>         
  </table>
  
</form>
</div>

<?php 
include ("footer.php");
?>