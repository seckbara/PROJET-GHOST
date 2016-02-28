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
              <a class="navbar-brand" href="#">Projet Ghost Sous Unix</a>
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
                    <div class="col-lg-4">
                      <form action="valider.php" method="post"> 
                              <table>
                              <h3><b>Connexion</b></h3><br>
                                <tr><th>login  </th><th><input type="text" name="login" /></th></tr>
                                <tr><th>passwd </th><th><input type="password" name="pass" /></th></tr>
                              </table>
                              </br>
                              <input type="submit" value="Connexion" class="btn btn-primary btn-sm">
                      </form>
                    </div>
                    <div class="col-lg-8">
                      <h3><b>Prérequis</b></h3><br>
                   <b><p align="left"> 
                    Pour bien manipuler cette Application il va falloire d'abord installer le clusterSSH avec la commande suivante : sudo apt-get install clusterssh
                    Avoir Wetty qui est un utilitaire permettant d’accéder au terminal par le navigateur 
                    Pour installer wetty, il faut d’abord installer git: sudo apt-get install git 
                    Installer Node.js : sudo apt-get install nodejs
                    Installer npm : sudo apt-get install npm
                    Une fois que tous les prérequis installer, Exécuter la commande suivante pour cloner le dépositoire Git Hub de wetty au système local. 
                    git https://github.com/krishnasrinivas/wetty
                    Se déplacer dans le dossier d’install : cd wetty 
                    Et taper la commande suivante : npm install
                    Une fois installé, vous pouvez démarrer wetty en tapant la commande suivant : noeud app.js -p 3000
</p></b>
                    </div>
        </div>



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
      </body>
</html>
