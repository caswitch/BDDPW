<?php

require_once 'models/recette.php';
require_once 'models/utilisateur.php';
require_once 'models/media.php';
require_once 'models/ingredient.php';

class Controller_Ingredient {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function selectIngredients() {
		$BASEURL = $this->context['BASEURL'];
	 	$array_ing = Ingredient::getAll();

		// Affichage de la liste des ingrédients
 		include 'views/nouvelle_recette2.php';
	}

	public function ingredientById($pId) {
		$BASEURL = $this->context['BASEURL'];
		$ing = Ingredient::getById($pId);

		// Affichage de la recette
    	include 'views/une_recette.php';
	}
}

