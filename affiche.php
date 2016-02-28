<?php
	session_start();
	if ((!isset($_SESSION['login']))) {
			header("location:index.php");
	}

 ?>
<?php
	include_once("connect.php");
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="foundation-6/css/foundation.css" />
    <link rel="stylesheet" href="foundation-6/css/foundation.min.css" />
    <link rel="stylesheet" href="foundation-6/css/normalize.css" />

</head>
<body id="image" >
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
        <div class="large-7 columns">
                <form action="affiche.php" method="post">
                	 <table>
								<tr>
									<td><label><input id="adresseIp" type="text" placeholder="nom_machine@adresse_ip" name="ip"  size="70"/></label></td>
									<td><label><input id="ajouter" type="submit" value="Ajouter" name='ajouter' class="success button" /></label></td>
								</tr>
					</table>									
    </div>
</div>
        <div class="row">
        <div class="large-7 columns">
            <div class="panel callout">
                <table class="hover">
                				<h4 align="center">Gestionnaire Des Adresses IP</h4>
								<tr>
									<th>Liste Adresses IP:</th>
									<th colspan="2">Action</th>
									<th>Selection</th>&nbsp; &nbsp;&nbsp; &nbsp;
								</tr>
										<?php
											if (isset($_POST['ajouter'])) { // s'il sagit d'une mise à jour
												$ip = htmlspecialchars($_POST['ip']);
												if(preg_match("#^[a-zA-Z0-9._-]+@[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$#", $ip)) {
												$req1 = "insert into machine (ip) values ('".$_POST['ip']."')";
												$res1 = mysql_query($req1,$conn);
												if (!$res1) {
													echo '
														<img  src = "foundation-6/img/attention.png" WIDTH=30  />
														 &nbsp; &nbsp;
														 <b>
														 <font color="red">cette adresse existe deja dans la base de données </font>
														 </b>'; 
													}				
												}else{
													echo '
														<img  src = "foundation-6/img/attention.png" WIDTH=30  />
														 &nbsp; &nbsp;
														 <b>
														 <font color="red">veuillez saisir une adresse ip valide</font>
														 </b>'; 
												}
											}
											
											
											$result = mysql_query("select * from machine",$conn); // je recupere les information de la table machine
											if ($result) {
												while ($req = mysql_fetch_array($result)) { // je recupere chaque ligne de la table
													echo "<tr><td>".$req["ip"]."</td>"; // l'affichage de chaque ligne
													//echo "<tr><td>".$req["id"]."</td>";
													if ($_SESSION['niv']==1) {
													
													echo "<td colspan='2'><a href='modifier.php?id=".$req['id']."' class='tiny round button'>Modifier</a>&nbsp;  &nbsp;";
													echo "<a href='supprimer.php?id=".$req['id']."'	onclick='return confirm('Voulez-vous Supprimer')' class='alert button' >Supprimer</a></td>";
													echo "<td><input type='checkbox' name='options[]' value='".$req['ip']."'><br></td></tr>";
													}

												}
											}
											else{
												echo "erreur d'execution";
												echo "le message:".mysql_error($conn);
											}
										
										?>

							</table>
            </div>
        </div>
         <div class="large-5 columns">
             <div class="panel callout">
                 <table class="hover" width=100% height=100%>
								<tbody>
										<h4> Liste Adresses IP Selectionner</h4>

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
												
								</tbody>								
							</table>
			</div>
		</div>
             </div>
         </div>
    </div>
<div class="row">
    <div class="large-5 columns">
    		<?php  if ($_SESSION['niv'] ==1) {
    			
    		   ?>
            <input type="submit" value="Valider La Selection" name='valider' class='tiny round button'/>
            <input type="submit" value="Executer" name='executer' class='tiny round button'/>
	        <input type="submit" value="Effaccer" name='effacer' class='tiny round button'/>
	        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
         		<iframe src="http://localhost:3000"
 					height="100" width="970">
			</iframe>
    </div>
</div>

</form>
</body>
</html>
