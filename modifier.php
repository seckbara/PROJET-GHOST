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
        <div class="large-11 columns">
								
			<?php echo 'Bienvenue Monsieur <b>'.$_SESSION['login'].'</b>'; ?>
							
   		</div>
   		<div class="large-1 columns">
				<a href="logout.php" class="item">
                   <label><b bgcolor="red"><font color="lightcoral" class="alert button">Déconnection</font></b></label>
                </a>									
   		</div>
</div>
 <div class="row">
        <div class="large-5 columns">
            <div>
					<section>
							<fieldset>
								<legend>Modification d'une adresse </legend>
												<?php
												$id = $_GET['id'];
									
														$result = mysql_query("select * from machine where id='".$id."'",$conn); // je recupere les information de la table machine
														if ($result) {
															$ip = mysql_fetch_array($result); // je recupere chaque ligne de la table
																echo "<form action='edit.php' method='post'>";
																echo "<input type='hidden' name='id' value='".$ip['id']."'/>";
																echo "<input type='text' name='ip' value='".$ip['ip']."'/>";  // l'affichage de chaque ligne
																echo "<input type='submit' value='valider' name='modifier' class='success button'>";
																echo "</form>";
														}
														else{
															echo "erreur d'execution";
															echo "le message:".mysql_error($conn);
														}
												?> 
							</fieldset>
						</div>
					</div>
				</div>
	</body>
</html>

