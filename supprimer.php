<?php 

	require_once("connect.php") ;
	session_start();
	if ((!isset($_SESSION['login']))) {
			header("location:index.php");
	}
 ?>
<?php
	if ($_SESSION['niv']==1) {
	require_once("connect.php");
	$id = $_GET['id'];
	$req = "delete from machine where id ='".$id."'";
	mysql_query($req) or die (mysql_error());
	header("location:affiche.php");
		
	}
	else{
		header("location:index.php");
	}

?>