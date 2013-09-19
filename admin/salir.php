<?
include_once '../clases/funciones.php';

$f = new funciones();
$f-> close_session();

?>
<script language='javascript'>
	alert('Su sesion ha finalizado. Gracias por utilizar AsistenTIC.')
	location.href='../';
</script>
