<?php 
$Servidor='localhost';//Nombre del servidor
$Usuario='root';//Nombre del Usuario
$Password='';//Contraseña del Usuario
$BaseDatos='gridsoa_asistentic';//Base de datos
$Copia='C:\AppServ\MySQL\bin\mysqldump.exe';
$Restore='c:\AppServ\MySQL\bin\mysql.exe';

if(!($link=mysql_connect($Servidor,$Usuario,$Password)))
{	
	header("location:errordatabase.php");
	exit(0);
}
if (!mysql_select_db($BaseDatos,$link)) 
{       
	header("location:errordatabase.php"); 
	exit(0);
} 
?>