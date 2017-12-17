<?php

require_once 'models/recette.php';
require_once 'models/utilisateur.php';
require_once 'models/media.php';
require_once 'models/ingredient.php';
require_once 'models/recette_ingredient.php';
require_once 'controllers/ingredient.php';

class Controller_Recette {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function creation() {
		$BASEURL = $this->context['BASEURL'];

		// On vérifie les saisies de l'utilisateur
		// avant de passer à l'étape 2 de la création de recette.
		// Le media et sa légendes sont optionnels.
		if (isset($_POST["cuisineca"])) {
			$_SESSION['etapeCR'] = 1;
			// Si les champs obligatoires ne sont pas remplis,
			// une alerte apparait et le formulaire doit être
			// remplis à nouveau.
			if (empty($_POST['nomNR']) || empty($_POST['descNR']) || 
				empty($_POST['diffNR']) || empty($_POST['prixNR']) ||
				empty($_POST['nb_persNR'])) {
				echo '<script language="javascript">';
				echo 'alert("Ta recette n\'est pas complète ! 😱")';
				echo '</script>';
			
			}
			else {
				// Si les champs obligatoires sont remplis,
				// on initialise $_SESSION['etapeCR'] pour 
				// "etape de la création de recette" à 1.
				// Ceci va nous permettre de présenter à l'utilisateur le 
				// formulaire adéquate à son étape de création de recette.
				$_SESSION['etapeCR'] = 1;

				// On vérifie si les champs optionnels on été remplis.
				// S'ils ont été remplis ou partiellement remplis, 
				// un média (de type image par défaut) est créé.
				// Ainsi, la recette sera illlustrée par une image
				// (avec ou non une légende).
				if (!empty($_POST['urlM']) && !empty($_POST['legM'])) {
					$idM = Media::nextIdMedia();
					$media = Media::creation("image", $_POST['urlM'], $_POST['legM']);
				}
				else if (!empty($_POST['urlM']) && empty($_POST['legM'])) {
					$idM = Media::nextIdMedia();
					$media = Media::creation("image", $_POST['urlM'], "");
				}
				// Si les champs optionnels n'ont pas été remplis,
				// une image par défaut illustrera la recette.
				else {
					// L'id de l'image par défaut est 35.
					$idM = "35";
				}
				// On vérifie si l'utilisateur qui créé la recette 
				// est connecté ou non.
				// Si l'utilisateur est connecté, on utilise son id.
				if (Utilisateur::est_connecte()) {
					$idU = Utilisateur::getIdUtilisateur();
				}
				// Si l'utilisateur n'est pas connecté,
				// on utilise l'id de l'utilisateur par défaut.
				else {
					// L'id de l'utilisateur par défaut est 1.
					$idU = "1";
				}
				// On stocke ce qui sera l'id de la recette créée
				// Elle sera utile lorsqu'on liera les ingrédients à 
				// la recette à l'étape 2.
				$_SESSION['idR'] = Recette::nextIdRecette();

				// On créé la recette.
				Recette::creation($_POST['nomNR'], $_POST['descNR'], $_POST['diffNR'], $_POST['prixNR'], $_POST['nb_persNR'], $idU, $idM);

				// Maintenant que la recette est créé,
				// l'utilisateur devra remplir le formulaire de l'étape 2 de 
				// création de recette.
				$_SESSION['etapeCR'] = 2;
			}
		}

		// On permet à l'utilisateur d'obtenir le formulaire adéquate 
		// aux étape de création de recette.
		//
		// L'utilisateur garde le formulaire de l'étape 1 de création 
		// de recette (même s'il clique qur "suivant" si :
		// - $_SESSION['etapeCR'] n'est pas initialisé (c'est que 
		// l'utiisateur vient d'arriver sur le formulaire 1),
		// - $_SESSION['etapeCR] vaut 1 (c'est que le formulaire 1 n'a pas 
		// été correcetement remplie).
		if (!isset($_SESSION['etapeCR']) || $_SESSION['etapeCR'] == 1) {
			// Affichage du formulaire de création d'une recette
			include 'views/nouvelle_recette.php';
		}
		// L'utilisateur obtient le formulaire de la page 2 si 
		// $_SESSION['etapeCR'] vaut 2 : le formulaire de l'étape 1 a été 
		// correctement remplie.
		else if ($_SESSION['etapeCR'] == 2) {
			// Le formulaire de l'étape 2 apparaît aux yeux de l'utilisateur.
			// C'est le formulaire qui permet de sélectionner les ingrédients 
			// pour la recette.
			$listIng = new Controller_Ingredient();
			$listIng->selectIngredients();

			// On vérifie qu'au moins un ingrédient a été coché
			// avant de passer à l'étape 3 de création de recette.
			if (isset($_POST["auxetapes"])) {
				// Si aucun ingrédient n'a été sélectionné,
				// une alerte apparait et le formulaire de cette étape
				// doit être remplis à nouveau.
				if (!isset($_POST['checkbox'])) {
					echo '<script language="javascript">';
					echo 'alert("Ta recette doit contenir au moins un ingrédient. 😓")';
					echo '</script>';
				}
				else {
					// Si au moins un ingrédient a été sélectionné, ...
					$nbrIng = Ingredient::nombreIngredient();

					// On stocke dans des tableaux :
					// - les ingrédients qui on été cochés,
					// - les quantités remplies,
					// - les unités renseignées.
					$checked_arr  = $_POST['checkbox'];
					$quantite_arr = $_POST['quantite'];
					$unite_arr    = $_POST['unite'];
					// On vérifie que pour chaque ingrédient coché, 
					// la quantité et l'unité ont été renseignées.
					foreach ($checked_arr as $checked_ing) {
						$idI = $checked_ing;
						// Si la quantité ou l'unité d'un ingrédient 
						// sélectionné n'est pas renseigné,
						// une alerte apparait et le formulaire de cette étape
						// doit être remplis à nouveau.
						if ($quantite_arr[$idI] === "" || $unite_arr[$idI] === "") {
							echo '<script language="javascript">';
							echo 'alert("Veuillez renseigner la quantité et l\'unité pour chaque ingrédient sélectionné.")';
							echo '</script>';
						}
						else {
							// Place les ingrédients dans la table qui lie les 
							// ingrédients aux recettes :RECETTE_INGREDIENT.
							$rec = new Recette();
							$test = $rec->getIdRecette();
							var_dump($test);
							exit(1);
							Recette_ingredient::creation($quantite_arr[$idI], $idR, $_SESSION['idR']);

						}

					}
				}
			}
		}
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

