<?php
session_start();
if($_SESSION['tipuser'] != "admin" || $_SESSION['estado'] != "enable"){

header("location:../denied");
}
?>