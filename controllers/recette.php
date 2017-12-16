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

		/* Vérification des saisies de l'utilisateur
		 * au moment où il soumet sa recette.
		 * Le media et sa légendes sont optionnels.
		 */
		if (isset($_POST["cuisineca"])) {
			if (empty($_POST['nomNR']) || empty($_POST['descNR']) || 
				empty($_POST['diffNR']) || empty($_POST['prixNR']) ||
				empty($_POST['nb_persNR'])) {
				// Si les champs obligatoires ne sont pas remplis,
				// une alerte apparait et le formulaire doit être
				// remplis à nouveau.
				echo '<script language="javascript">';
				echo 'alert("Ta recette n\'est pas complète ! 😱")';
				echo '</script>';
			
			}
			else {
				// Si les champs obligatoires sont remplis,
				// on vérifie si c'est le cas des champs optionnels.
				if (!empty($_POST['urlM']) && !empty($_POST['legM'])) {
					$idM = Media::nextIdMedia();
					$media = Media::creation("image", $_POST['urlM'], $_POST['legM']);
				}
				else if (!empty($_POST['urlM']) && empty($_POST['legM'])) {
					$idM = Media::nextIdMedia();
					$media = Media::creation("image", $_POST['urlM'], "");
				}
				else {
					// Si les champs optionnels (pour le media) n'ont
					// pas été remplis, on utilise une image par défaut.
					// L'id de l'image par défaut est 35.
					$idM = "35";
				}
				// On vérifie si l'utilisateur qui créé la recette 
				// est connecté ou non.
				// Si l'utilisateur est connecté, on utilise son id,
				// sinon, on utilise l'id de l'utilisateur par défaut.
				if (Utilisateur::est_connecte()) {
					$idU = Utilisateur::getIdUtilisateur();
				}
				else {
					// L'id de l'utilisateur par défaut est 1.
					$idU = "1";
				}

				// On créé la recette.
				Recette::creation($_POST['nomNR'], $_POST['descNR'], $_POST['diffNR'], $_POST['prixNR'], $_POST['nb_persNR'], $idU, $idM);
				// Maintenant que la recette est créé, l'utilisateur va être 
				// redirigé vers la page d'acceuil.
				// Il y trouvera un petit message : $_SESSION['message'.
				$_SESSION['message'] = 'Miam cette nouvelle recette ! 😊'; 

				$home = 'Location: '.$BASEURL.'/index.php';
				header($home);
				exit();
			}
		}
		// Affichage du formulaire de création d'une recette
		include 'views/nouvelle_recette.php';
	}

	public function listeRecettes() {
		$BASEURL = $this->context['BASEURL'];
	 	$array_rec = Recette::getAll();

		// Affichage de la liste de toutes les recettes
 		include 'views/liste_des_recettes.php';
	}

	public function recetteById($pId) {
		$BASEURL = $this->context['BASEURL'];
		$rec = Recette::getById($pId);

		// Affichage de la recette
    	include 'views/une_recette.php';
	}
	
}

