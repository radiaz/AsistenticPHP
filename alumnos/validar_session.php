<?php
session_start();

if(($_SESSION['tipuser'] != "docente"&&$_SESSION['tipuser'] != "admin" )|| $_SESSION['estado'] != "enable"){

	header("location:../denied");
}
?>