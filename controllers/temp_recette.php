<?php

require_once 'models/recette.php';
require_once 'models/utilisateur.php';
require_once 'models/media.php';

class Controller_Recette {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function creation() {
		$BASEURL = $this->context['BASEURL'];

		if (isset($_POST["cuisineca"])) {
			var_dump($_POST['nomNR']);
			var_dump($_POST['descNR']);
			var_dump($_POST['diffNR']);
			var_dump($_POST['prixNR']);
			var_dump($_POST['nb_persNR']);
			var_dump($_POST['mediaNR']);
			var_dump($_POST['legNR']);
			exit(1);
			if (empty($_POST['nom']) ||  empty($_POST['desc']) || empty($_POST['diff']) || empty($_POST['prix']) || empty($_POST['nb_pers'])) {
				echo '<script language="javascript">';
				echo 'alert("Ta recette n\'est pas complète ! 😱")';
				echo '</script>';
			}
			else {
				if (!empty($_POST['url'])) {
					// Si une url pour un média a été renseignée
					// mais pas le type du média
					if (empty($_POST['typ'])) {
						echo '<script language="javascript">';
						echo 'alert("De quel type est ton média ?")';
						echo '</script>';
					}
					else {
						if (!empty($_POST['leg'])) {
							$media = Media::creation($_POST['typ'], 
								$_POST['url'], $_POST['leg']);
						}
						else {
							// Pas de légende au média
							$media = Media::creation($_POST['typ'], 
								$_POST['url'], "");
						}
						$idM = Media::media.getIdMedia();
					}
				}
				else {
					// L'utilisateur n'a pas rempli d'url
					// On prend l'Id de l'image par défaut
					$idM = 35; 
				}
				if (!Utilisateur::est_connecte()) {
					// Utilisateur anonyme
					$idU = 0;
				}
				else {
					$u = new Utilisateur();
					$idU = $u->getIdUtilisateur();
				}

				Recette::nouvelle_recette($_POST['nom'], $_POST['desc'], $_POST['diff'], $_POST['prix'], $_POST['nb_pers'], $idU, $idM);

				$_SESSION['message'] = 'Miam ! 😊'; 

				$home = 'Location: '.$BASEURL.'/index.php';
				header($home);
				exit();
			}
		}

		include 'views/nouvelle_recette.php';
	}

	public function listeRecettes() {
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

