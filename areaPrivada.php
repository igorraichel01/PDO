<?php
session_start();
if(!isset($_SESSION['idusuario']))
{
	header("location:index.php ");
	exit;
}


?>



 seja bem vindo A SUA SEÇÃO
 <a href="sair.php">Sair</a>