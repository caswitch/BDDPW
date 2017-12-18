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

		var_dump($_POST);

		$user = Utilisateur::getBySession();
		$recettes = Recette::getAll();


		if (isset($_POST["newplanning"])) {

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

 		include 'views/creation_planning.php';
	}
	public function listePlannings() {
		$BASEURL = $this->context['BASEURL'];

		include 'views/liste_des_plannings.php';
	}
}
