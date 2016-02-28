<?php 

	require_once("connect.php") ;
	session_start();
	if ((!isset($_SESSION['login']))) {
			header("location:index.php");
	}
 ?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Projet-Ghost</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	    <link rel="stylesheet" href="foundation-6/css/foundation.css" />
	    <link rel="stylesheet" href="foundation-6/css/foundation.min.css" />
	    <link rel="stylesheet" href="foundation-6/css/normalize.css" />
		<link href="style.css" rel="stylesheet" media="all" type="text/css"/> 
		</head>

	<body id="image">
<div class="row">
    <div class="large-12 columns">
            <h1 align="center"><i>INSTALLATION SUR PLUSIEUR PC</i></h1>
    </div>
</div>
 <div class="row">
        <div class="large-5 columns">
            <div>
					<section>
							<fieldset>
								<legend>Modification d'une adresse </legend>
												<?php
												$id = $_POST['id'];
												$ip = $_POST['ip'];
												$req = "UPDATE `machine` SET `ip` = '".$ip."' WHERE `id` =".$id."";
												
									
														$result = mysql_query($req) // je recupere les information de la table machine
														or die (mysql_error());
														header("location:affiche.php");

												?> 
							</fieldset>
						</div>
					</div>
				</div>
	</body>
</html>