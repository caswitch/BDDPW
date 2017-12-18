<?php

require_once 'models/recette.php';
require_once 'models/utilisateur.php';
require_once 'models/media.php';
require_once 'models/ingredient.php';
require_once 'models/recette_ingredient.php';
require_once 'models/etape.php';
require_once 'controllers/ingredient.php';

class Controller_Recette {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function creation() {
		$BASEURL = $this->context['BASEURL'];

		// On affiche la liste de tous les ingrédients de la base
	 	$array_ing = Ingredient::getAll();
		$nbrIngredients = Ingredient::nombreIngredients();

		// On vérifie les saisies de l'utilisateur
		// avant la création de la recette.
		//
		// Si l'utilisateur appuie sur le bouton qui valide le formulaire, ...
		if (isset($_POST["cuisineca"])) {
			// Si les champs obligatoires ne sont pas remplis,
			// une alerte apparait.
			if (empty($_POST['nomNR']) || empty($_POST['descNR']) || 
				empty($_POST['diffNR']) || empty($_POST['prixNR']) ||
				empty($_POST['nb_persNR'])) {
				echo '<script language="javascript">';
				echo 'alert("Ta recette n\'est pas complète ! 😱")';
				echo '</script>';
			
			}
			// Si les champs obligatoires sont remplis, ...
			else {
				// On vérifie si les champs optionnels on été remplis.
				$hasUrlM = false;
				$hasLegM = false;

				// Si une url d'une image a été renseignée,
				// on vérifie si la légende de l'image a été renseignée.
				if (!empty($_POST['urlM'])) {
					$hasUrlM = true;
				   	if (!empty($_POST['legM'])) {
						$hasLegM = true;
					}
				}
				// On vérifie qu'au moins un ingrédient a été coché.
				// Si aucun ingrédient n'a été sélectionné,
				// une alerte apparait.
				if (!isset($_POST['checkbox'])) {
					echo '<script language="javascript">';
					echo 'alert("Ta recette doit contenir au moins un ingrédient. 😓")';
					echo '</script>';
				}
				// Si au moins un ingrédient a été sélectionné, ...
				else {
					// On stocke dans des tableaux :
					// - les ingrédients qui on été cochés,
					// - les quantités de ces ingrédients.
					$checked_arr  = $_POST['checkbox'];
					$quantite_arr = $_POST['quantite'];

					// On vérifie que pour chaque ingrédient coché, 
					// la quantité a été renseignée.
					// Les quantités renseignées sans que l'ingrédient 
					// n'ait été coché ne sont pas prises en compte.
					foreach ($checked_arr as $checked_ing) {
						$idIngredient = $checked_ing;
						// Si la quantité de l'ingrédient n'est pas 
						// renseignée, une alerte apparait.
						if ($quantite_arr[$idIngredient] === "") {
							echo '<script language="javascript">';
							echo 'alert("Veuillez renseigner la quantité pour chaque ingrédient sélectionné. 😓")';
							echo '</script>';
						}
					}
				}
				// On vérifie les étapes renseignées nécessaires à la 
				// création de la recette.
				// Si aucune étape n'a été correctement renseignée 
				// (durée et description), une alerte apparait.
				$dureeEtape_arr = $_POST['dureeEtape'];
				$descrEtape_arr = $_POST['descrEtape'];

				if (empty($dureeEtape_arr[1]) || empty($descrEtape_arr[1])) {
					echo '<script language="javascript">';
					echo 'alert("Renseigne au moins une étape nécessaire à la création de ta recette. ")';
					echo '</script>';
				}
				// Si au moins une étape a été correctement renseignée, ...
				else {
					$nbrEtape = count($dureeEtape_arr);
					// Si la dernière étape n'est pas remplie, 
					// elle ne devra pas être prise en compte.
					if (empty($dureeEtape_arr[$nbrEtape]) || empty($descrEtape_arr[$nbrEtape])) {
						$nbrEtape--;
					}
					// Enfin, on vérifie si l'utilisateur qui créé la recette 
					// est connecté ou non.
					// Si l'utilisateur est connecté, on utilise son id.
					if (Utilisateur::est_connecte()) {
						$idUtilisateur = Utilisateur::getIdUtilisateur();
					}
					// Si l'utilisateur n'est pas connecté,
					// on utilise l'id de l'utilisateur par défaut.
					else {
						// L'id de l'utilisateur par défaut est 1.
						$idUtilisateur = "1";
					}

					// C'EST MAINTENANT QUE LES DONNÉES VONT ÊTRE 
					// ENVOYÉES DANS LA BASE DE DONNÉES.
					// La recette sera illustrée par une image.
					// Cette image sera celle renseignée par l'utilisateur
					// ou par une image par défaut s'il n'en a pas renseignée.
					// Illustration de l'utilisateur
					if ($hasUrlM) {
						$idMedia = Media::nextIdMedia();
						// Avec légende
						if ($hasLegM) {
							Media::creation("image", $_POST['urlM'], $_POST['legM']);
						}
						// Sans légende
						else {
							Media::creation("image", $_POST['urlM'], "");
						}
					}
					// Illustration par défaut
					else {
						// L'id de l'image par défaut est 35.
						// On ne créé pas cette image car elle existe 
						// déjà dans la base de données.
						$idMedia = "35";
					}

					$idRecette = Recette::nextIdRecette();

					// On créé la recette.
					Recette::creation($_POST['nomNR'], $_POST['descNR'], $_POST['diffNR'], $_POST['prixNR'], $_POST['nb_persNR'], $idUtilisateur, $idMedia);
					// On lie les ingrédients à la recette dans la 
					// table RECETTE_INGREDIENT.
					foreach ($checked_arr as $checked_ing) {
						$idIngredient = $checked_ing;
						//var_dump($idIngredient);
						//var_dump($quantite_arr[$idIngredient]);
						Recette_ingredient::creation($quantite_arr[$idIngredient], $idRecette, $idIngredient);
					}

					// On lie les étapes à la recette.
					// Nous ne mettons pas de média dans les étapes.
					for ($i = 1; $i <= $nbrEtape; $i++) {
						Etape::creation($i, $descrEtape_arr[$i], $dureeEtape_arr[$i], $idRecette, "");
					
					}
					$_SESSION['message'] = 'Merci pour cette délicieuse nouvelle recette! 😊'; 
					$home = 'Location: '.$BASEURL.'/index.php';
					header($home);
					exit();
				}
			}
		}
		// Affichage du formulaire de création de recette
		include 'views/nouvelle_recette.php';
	}

	public function listeRecettes() {
		$BASEURL = $this->context['BASEURL'];
	 	$array_rec = Recette::getAll();

		// Affichage de la liste de toutes les recettes
 		include 'views/liste_des_recettes.php';
	}

	public function recetteById($pIdRecette) {
		$BASEURL = $this->context['BASEURL'];
		$quantites = array();

		$recette = Recette::getById($pIdRecette); //
		$idRecette = $recette->getIdRecette(); //
		$ingredients = Ingredient::getByIdRecette($idRecette); //

		foreach ($ingredients as $ing) {
			$idIngredient = $ing->getIdIngredient();
			$quantites[] = Recette_ingredient::getQuantite($idRecette, $idIngredient);
		}
		$etapes = Etape::getByRecette($pIdRecette);
		$idUt = $recette->getIdUtilisateur();
		$utilisateur = Utilisateur::getById($idUt);

		// Affichage de la recette
    	include 'views/une_recette.php';
	}

	public function rechercheParUnIngredient() {
		$BASEURL = $this->context['BASEURL'];
		$afficheListe = false;

		// On affiche la liste de tous les ingrédients de la base
	 	$array_ing = Ingredient::getAll();

		if (isset($_POST["recherche"])) {
			if (empty($_POST['selectIng'])) {
				echo '<script language="javascript">';
				echo 'alert("La recherche par ingrédient nécessite un ingrédient sélectionné.")';
				echo '</script>';
			}
			else {
				$idIngredient = Ingredient::getIdByNom($_POST['selectIng']);

				if (empty($_POST['triepar'])) {
					$array_id = Recette_ingredient::getIdRecetteByIdIngredient($idIngredient);
				}
				else {
					$trie = $_POST['triepar'];
					switch ($trie) {
						case "1": // - Titre +
							$orderBy = "nom";
							$asc = "ASC";
							break;
						case "2": // + Titre -
							$orderBy = "nom";
							$asc = "DESC";
							break;
						case "3": // - Nombre de personnes +
							$orderBy = "nb_pers";
							$asc = "ASC";
							break;
						case "4": // + Nomde de personnes -
							$orderBy = "nb_pers";
							$asc = "DESC";
							break;
						case "5": // - Prix +
							$orderBy = "prix";
							$asc = "ASC";
							break;
						case "6": // + Prix -
							$orderBy = "prix";
							$asc = "DESC";
							break;
						case "7": // - Difficulté +
							$orderBy = "difficulte";
							$asc = "ASC";
							break;
						case "8": // + Difficulté -
							$orderBy = "difficulte";
							$asc = "DESC";
							break;
					}

					$array_id = Recette_ingredient::getIdRecetteByIdIngTrie($idIngredient, $orderBy, $asc);
				}

				foreach ($array_id as $idRecette) {
					$array_rec[] = Recette::getById($idRecette);
				}

				$afficheListe = true;
			}
		}
		// Affichage le formulaire de recherche
    	include 'views/recherche_par_un.php';
		if ($afficheListe == true) {
			// Affichage de la liste de toutes les recettes
			include 'views/liste_des_recettes.php';
		}
		$afficheListe = false;
	}

	public function rechercheParDesIngredients() {
		$BASEURL = $this->context['BASEURL'];
		$afficheListe = false;

		// On affiche la liste de tous les ingrédients de la base
	 	$array_ing = Ingredient::getAll();

		if (isset($_POST["recherchepardes"])) {
			if (!isset($_POST['checkbox'])) {
				echo '<script language="javascript">';
				echo 'alert("La recherche doit contenir au moins un ingrédient.")';
				echo '</script>';
			}
			else {
				$checked_arr  = $_POST['checkbox'];
				$array_idI = array();

				foreach ($checked_arr as $checked_ing) {
					$array_idI[] = $checked_ing;
				}
				if (empty($_POST['triepar'])) {
					$array_id = Recette_ingredient::getIdRecetteByIdIngredients($array_idI);
				}
				else {
					$trie = $_POST['triepar'];
					switch ($trie) {
						case "1": // - Titre +
							$orderBy = "nom";
							$asc = "ASC";
							break;
						case "2": // + Titre -
							$orderBy = "nom";
							$asc = "DESC";
							break;
						case "3": // - Nombre de personnes +
							$orderBy = "nb_pers";
							$asc = "ASC";
							break;
						case "4": // + Nomde de personnes -
							$orderBy = "nb_pers";
							$asc = "DESC";
							break;
						case "5": // - Prix +
							$orderBy = "prix";
							$asc = "ASC";
							break;
						case "6": // + Prix -
							$orderBy = "prix";
							$asc = "DESC";
							break;
						case "7": // - Difficulté +
							$orderBy = "difficulte";
							$asc = "ASC";
							break;
						case "8": // + Difficulté -
							$orderBy = "difficulte";
							$asc = "DESC";
							break;
					}

					$array_id = Recette_ingredient::getIdRecetteByIdIngsTrie($array_idI, $orderBy, $asc);
				}

				//$array_id = Recette_ingredient::getIdRecetteByIdIngredients($array_idI);

				$array_rec = array();

				foreach ($array_id as $idRecette) {
					$array_rec[] = Recette::getById($idRecette);
				}

				$afficheListe = true;
			}
		}
		
		// Affichage le formulaire de recherche
    	include 'views/recherche_par_des.php';
		if ($afficheListe == true) {
			// Affichage de la liste de toutes les recettes
			include 'views/liste_des_recettes.php';
		}
		$afficheListe = false;
	}
}

