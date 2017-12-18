<?php

require_once 'models/planning.php';
require_once 'models/menu.php';
require_once 'models/menu_planning.php';
require_once 'models/recette.php';
require_once 'models/utilisateur.php';

class Controller_Planning {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function creation() {
		$BASEURL = $this->context['BASEURL'];
		
		$user = Utilisateur::getBySession();
		
		if (!$user){
			echo "<h1>403</h1>";
			echo "<h2>Connectes-toi petit rat</h2>";
			$_SESSION['message'] = 'Il faut te connecter pour ça petit rat ! 😋'; 
			$home = 'Location: '.$BASEURL.'/index.php';
			header($home);
			exit();
		}

		var_dump($_POST);

		if (isset($_POST["newplanning"])) {
			$user = Utilisateur::getBySession();

			$planning = new Planning(
				$_POST["date"], 
				$user->getIdUtilisateur()
			);
 			
 			$menu = new Menu(
 				$_POST["date"],
 				$_POST["type"]
 			);

			$planning->addRecette($_POST["recette"]);
		}

		$recettes = Recette::getAll();
 		
 		include 'views/creation_planning.php';
	}
	public function listePlannings() {
		$BASEURL = $this->context['BASEURL'];

		include 'views/liste_des_plannings.php';
	}
}
