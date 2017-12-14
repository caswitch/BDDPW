<?php

require_once 'models/recette.php';

class Controller_Recette {
	public function __construct() {}

	public function nouvelle_recette() {
		include 'views/nouvelle_recette.php';
	}

	public function recette_create() {
		$a = Recette::create($_POST['recette'],$_POST['difficulte'],$_POST['dateRecette']);
		include 'views/recette.php';
	}

	public function recette_id($id) {
		$a = Recette::getById($id);
    	include 'views/une_recette.php';
	}

	public function listes_des_recettes() {
	 	$array_rec = Recette::getAll();
 		include 'views/liste_des_recettes.php';
	}
}

