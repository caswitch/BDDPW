<?php session_start(); 

include_once 'models/bdd.php';

define('BASEURL', dirname($_SERVER['SCRIPT_NAME']));

try {
	// Connexion à la base de données Oracle
	$bdd = Bdd::getInstance();
}
catch(PDOException $e) {
	die('Echec de la connexion : '.$e->getMessage());
}

/*
$req = $bdd->requete("SELECT table_name FROM user_tables");
if (!is_object($req)) {
	echo 'La requête n\'est pas un objet.';
}

while ($donnees = $req->fetch()) { ?>
		<p>
		<strong>TABLE_NAME</strong> :
			<?php 
			print_r($donnees);
			print("\n");
			?>
			<br />
		</p>
<?php
}

$req->closeCursor();
*/

if (!empty($_GET['page']) && is_file('controllers/'.$_GET['page'].'.php')) {
	include 'controllers/'.$_GET['page'].'.php';
}
else {
	include 'controllers/home.php';
}

