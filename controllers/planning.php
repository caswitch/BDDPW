<?php

require_once 'models/planning.php';
require_once 'models/menu.php';
require_once 'models/menu_planning.php';
require_once 'models/recette.php';
require_once 'models/recette_menu.php';
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
		if (isset($_POST["newplanning"])) {

			//var_dump($_POST['date']); //0123-02-01 RRRR-MON-DD
			$array_rec = $_POST['recette'];
			$array_typ = $_POST['type'];

			$idRecettes = array();
			$types = array();

			foreach ($array_typ as $type) {
				if (!empty($type)) {
					$types[] = $type;
				}
			}

			foreach ($array_rec as $idRecette) {
				if (!empty($idRecette)) {
					$idRecettes[] = $idRecette;
				}
			}

			$idPlanning = Planning::nextIdPlanning();

 			$planning = new Planning($idPlanning, $_POST["date"], $user->getIdUtilisateur());
			$planning->inject();
			//var_dump($planning->inject());

			$idPlanning = $planning->getIdPlanning();

			$nbrMenu = count($idRecettes);
			
			$menus = array();
			$idsMenu = array();
			for ($i = 0; $i < $nbrMenu; $i++) {
				$idMenu = Menu::nextIdMenu();
				$menus[$i] = new Menu($idMenu, $_POST["date"], $types[$i]);
				$menus[$i]->inject();

				$idsMenu[$i] = $menus[$i]->getIdMenu();
				
				$recette_menu = new Recette_menu($idsMenu[$i], $idRecettes[$i]);
				$recette_menu->inject();

				$menu_plannning = new Menu_planning($idsMenu[$i], $idPlanning);
				$menu_plannning->inject();
			}

			$_SESSION['message'] = 'Votre planning a été créé. 😊'; 
			$home = 'Location: '.$BASEURL.'/index.php';
			header($home);
			exit();
			//$planning->addRecette($_POST["recette"]);
		}

		$recettes = Recette::getAll();
 		
 		include 'views/creation_planning.php';
	}
	public function listeMesPlannings() {
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
		$idUtilisateur = $user->getIdUtilisateur();
			
		$array_mes_plannings = Planning::getByUtilisateur($idUtilisateur);

		include 'views/liste_plannings.php';
	}

	public function planningById($pIdPlanning) {
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
		$idUtilisateur = $user->getIdUtilisateur();

		$array_menus = Menu::getAllByPlanning($pIdPlanning);

		include 'views/un_planning.php';
	}

	public function menuById($pIdMenu) {
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
		$idUtilisateur = $user->getIdUtilisateur();

		include 'views/un_menu.php';
	}		
}
