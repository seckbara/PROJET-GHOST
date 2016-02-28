<?php 
	require_once("connect.php") ;
	session_start();
	if ((!isset($_SESSION['login']))) {
			header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="fr">
      <head>
           <link href="bootstrap-3.3.6/dist/css/bootstrap.css" rel="stylesheet">
           <script src="bootstrap-3.3.6/js/jquery.js"></script>
           <script src="bootstrap-3.3.6/js/bootstrap.min.js"></script>
           <meta http-equiv="content-type" content="text/html; charset=utf-8" />
           <script src="bootstrap-3.3.6/dist/js/jquery.js"></script>
           <script src="bootstrap-3.3.6/dist/js/jquery.min.js"></script>
      </head>

      <body >
    <!--   Ménu du site !-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                <li><a href="pre.php">Prérequis</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>


<div class="container">
              <br/><br/>
              <div class="row">
                <div class="col-lg-3"><i><?php echo 'Bienvenue Monsieur <b>'.$_SESSION['login'].'</b>'; ?></i></div>
                <div class="col-lg-offset-6 col-lg-3">
					<a href="logout.php" class="btn btn-danger">Deconnexion <span class="glyphicon glyphicon-user"></span></a>
                </div>
              </div>
              <br/><br/>

												<?php
												$id = $_GET['id'];
									
														$result = mysql_query("select * from machine where id='".$id."'",$conn); // je recupere les information de la table machine
														if ($result) {
															$ip = mysql_fetch_array($result); // je recupere chaque ligne de la table
																echo "<form action='edit.php' method='post'>";
																echo "<div class='row'><div class='col-lg-5'><input type='hidden' name='id' value='".$ip['id']."'/>";
																echo "<input type='text' name='ip' value='".$ip['ip']."' class='form-control' /></div>";  // l'affichage de chaque ligne
																echo "<div class='col-lg-1'><input type='submit' value='valider' name='modifier' class='btn btn-success btn-block'></div></div>";
																echo "</form>";
														}
														else{
															echo "erreur d'execution";
															echo "le message:".mysql_error($conn);
														}
												?> 

</html>

