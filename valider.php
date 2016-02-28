<?php 

	require_once("connect.php") ;
	session_start();
	if ((!isset($_SESSION['login']))) {
			header("location:index.php");
	}
 ?>
<?php
	include_once("connect.php");
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$pc = md5($pass);
	$req = "select * from users where login='".$login."' and pass='".$pc."'";
	$result = mysql_query($req) or die (mysql_error());
	if ($u = mysql_fetch_assoc($result)) {
		session_start();
		$_SESSION['login'] = $u['login'];
		$_SESSION['niv'] = $u['niveau'];
		header("location:affiche.php");
	}
	else {
			header("location:index.php");
	}
?>