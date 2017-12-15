<?php

require_once 'models/recette.php';
require_once 'models/utilisateur.php';

class Controller_Recette {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function nouvelle_recette() {
		$BASEURL = $this->context['BASEURL'];

		if (isset($_POST["cuisineca"])) {
			if (empty($_POST['nom']) ||  empty($_POST['desc']) || empty($_POST['diff']) || empty($_POST['prix']) || empty($_POST['nb_pers'])) {
				echo '<script language="javascript">';
				echo 'alert("Ta recette n\'est pas complète ! 😱\nAux fournaux ! 😃")';
				echo '</script>';
			}
			else {

				if (!Utilisateur::est_connecte()) {
					// Utilisateur anonyme
					$idU = 0;
				}
				else {
					$u = new Utilisateur();
					$idU = $u->getId();
				}

				// Par défault
				$idM = $BASEURL.'/img/ratatouille_pancarte.png';

				Recette::nouvelle_recette($_POST['nom'], $_POST['desc'], $_POST['diff'], $_POST['prix'], $_POST['nb_pers'], $idU, $idM);

				$_SESSION['message'] = 'Miam ! 😊'; 

				$home = 'Location: '.$BASEURL.'/index.php';
				header($home);
				exit();
			}
		}

		include 'views/nouvelle_recette.php';
	}

	public function listes_des_recettes() {
		$BASEURL = $this->context['BASEURL'];
	 	$array_rec = Recette::getAll();
 		include 'views/liste_des_recettes.php';
	}

	public function recetteById($pId) {
		$BASEURL = $this->context['BASEURL'];
		$rec = Recette::getById($pId);

    	include 'views/une_recette.php';
	}
	
}

