<?php
  session_start();
  if ((!isset($_SESSION['login']))) {
      header("location:index.php");
  }

 ?>
<?php
  include_once("connect.php");
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
        <nav class="navbar navbar-inverse navbar-fixed-top ">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project Ghost Sous Linux</a>
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
                <div class="col-lg-offset-9 col-lg-3">
                    <div class="btn-group"> 
                      <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      <?php echo '<b>Bienvenue   '.$_SESSION['login']. '</b>'; ?>
                            <span class="glyphicon glyphicon-user "></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="index.php"><span>Accueil</span></a></li>
                        <li><a href="logout.php">Déconnexion<span></span></a></li>
                      </ul>
                    </div>
                </div>
              </div>
              <br/><br/>
        <form action="affiche.php" method="post">
              <div class="row">
                    <div class="col-lg-5">
                        <input type="text" size="73" placeholder="nom_machine@ip" class="form-control" name="ip"></div>
                    <div class="col-lg-1">
                        <input type="submit" class="btn btn-success btn-block" value="Ajouter" name="ajouter">
                    </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">

                          <h2 align="center" ><span class="label label-success">Gestionnaire d'adresse IP</span></h2>
                          <thead>
                            <tr>
                              <th>Liste Adresse</th>
                              <th colspan="2">Action</th>
                              <th>Selection</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <?php
											if (isset($_POST['ajouter'])) { 
												$ip = htmlspecialchars($_POST['ip']);
												if(preg_match("#^[a-zA-Z0-9._-]+@[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$#", $ip)) {
												$req1 = "insert into machine (ip) values ('".$_POST['ip']."')";
												$res1 = mysql_query($req1,$conn);
												if (!$res1) {
													 echo '<div class="form-group has-error">
                                  <label class="control-label" for="idError">Erreur</label>
                                  <span class="help-block">Veuillez saisir une adresse ip valide</span>
                                </div>';
													}				
												}else{
													echo '<div class="form-group has-error">
                                  <label class="control-label" for="idError">Erreur</label>
                                  <span class="help-block">Veuillez saisir une adresse ip valide</span>
                                </div>'; 
												}
											}
											
											
											$result = mysql_query("select * from machine",$conn); // je recupere les information de la table machine
											if ($result) {
												while ($req = mysql_fetch_array($result)) { // je recupere chaque ligne de la table
													echo "<tr><td>".$req["ip"]."</td>"; // l'affichage de chaque ligne
													//echo "<tr><td>".$req["id"]."</td>";
													if ($_SESSION['niv']==1) {
													echo "<td colspan='2'><a href='modifier.php?id=".$req['id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span> Modifier</a>&nbsp;&nbsp;&nbsp;&nbsp;";

													echo "<a href='supprimer.php?id=".$req['id']."' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Supprimer</a></td>";

													echo "<td class='checkbox'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type='checkbox' name='options[]' value='".$req['ip']."'><br></td></tr>";
													}

												}
											}
											else{
												echo "erreur d'execution";
												echo "le message:".mysql_error($conn);
											}
										
										?>

                            </tr>
                          </tbody>

                  </table>  
                </div>

                <div class="col-lg-4">
                  <table class="table table-bordered table-striped table-condensed">

                          <h2 align="center"><span class="label label-success">Adresses IP Selectionner</span></h2>
                          <thead>
                            <tr>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                              	
                              	<?php 

											if(isset($_POST['valider']) && isset($_POST['options'])){
												if(!empty($_POST['options']))
												{
													foreach($_POST['options'] as $val){
														echo "<tr><td>".$val."</td></tr>";		
														}
												}
													function ip_machine(){ 
													$ip=null;
													$fich="/home/info/.clusterssh/clusters";
													$fp=fopen($fich,"a+");
													ftruncate($fp,0); // on place le pointeur à 0 
													fputs($fp,"info "); 
													foreach($_POST['options'] as $val){
													fputs($fp,"".$val."  "); 
													}
														fputs($fp,$ip); 
														fclose($fp);	
													} 
														ip_machine();

											}

											if(isset($_POST['executer'])){
											   fopen("home/info/.clusterssh/c","x+");
											  
											}

											if(isset($_POST['effacer'])){
												$fich="/home/info/.clusterssh/clusters";
												$fp=fopen($fich,"x+");
												ftruncate($fp,0);
												fclose($fp);
												header("location:affiche.php");
												
											}

										?>

                              </td>
                            </tr>
                          </tbody>

                  </table>  
                </div>
		          </div>
              <div class="row">
                    <div class="col-lg-6">
                    	<?php  if ($_SESSION['niv'] ==1) { ?>
				            <input type="submit" value="Valider La Selection" name='valider' class='btn btn-primary btn-block">'/>
				            <input type="submit" value="Executer" name='executer' class='btn btn-primary btn-block">'/>
					        <input type="submit" value="Effacer" name='effacer' class='btn btn-primary btn-block">'/>
	        			<?php } ?>
                    </div>
              </div>
              </br>
			  <div class="row">
            <div class="col-lg-12">
					    <iframe src="http://localhost:3000" height="100" width="970">
			        </iframe>
                </div>
            </div>

    </form>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="bootstrap-3.3.6/dist/js/jquery.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
      </body>
</html>
