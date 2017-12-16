<?php

require_once(dirname(__FILE__).'/bdd.php');

class Ingredient extends Bdd {
	private $id_ingredient;	
	private $nom;
	private $unite;
	private $calories;
	private $lipides;
	private $glucides;
	private $protides;
	private $id_media;

	public function __construct($pId_ingredient, $pNom, $pUnite, $pCalories, $pLipides, $pGlucides, $pProtides, $pId_media) {
		$this->id_ingredient = $pId_ingredient;
		$this->nom           = $pNom;
		$this->unite         = $pUnite;
		$this->calories      = $pCalories;
		$this->lipides       = $pLipides;
		$this->glucides      = $pGlucides;
		$this->protides      = $pProtides;
		$this->id_media      = $pId_media;
	}

	/* Accesseurs */

	public function setIdIngredient($pIdI) {
		$pIdI = (int) $pIdI;

		if ($pIdI > 0) {
			$this->id_ingredient = $pIdI;
		}
	}

	public function getIdIngredient() {
		return $this->id_media;
	}

	public function setNom($pNom) {
		$this->nom = $pNom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setUnite($pUnite) {
		$this->unite = $pUnite;
	}

	public function getUnite() {
		return $this->unite;
	}

	public function setCalories($pCalories) {
		$this->calories = $pCalories;
	}

	public function getCalories() {
		return $this->calories;
	}

	public function setLipides($pLipides) {
		$this->lipides = $pLipides;
	}

	public function getLipides() {
		return $this->lipides;
	}

	public function setGlucides($pGlucides) {
		$this->glucides = $pGlucides;
	}

	public function getGlucides() {
		return $this->glucides;
	}

	public function setProtides($pProtides) {
		$this->protides = $pProtides;
	}

	public function getProtides() {
		return $this->protides;
	}

	public function setIdMedia($pIdMedia) {
		$this->id_media = $pIdMedia;
	}

	public function getIdMedia() {
		return $this->id_media;
	}

	public static function nextIdIngredient() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_ingredient) FROM ingredient");
		$id = $req->fetchColumn(0);
		if ($id) {
			$id = (int) $id;
			$id = $id + 1;
		}
		else {
			$id = 1;
		}
		return $id;
	}

	// Renvoie le nombre d'ingrédients dans la base
	// Ce nombre correspont au plus grand 
	public static function nombreIngredient() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT count(*) FROM ingredient");
		$nbr = $req->fetchColumn(0);

		return $nbr;
	}

	public static function creation($pNom, $pUnite, $pCalories, $pLipides, $pGlucides, $pProtides, $pId_media) {
		$idI = self::nextIdIngredient();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO ingredient 
			VALUES (:idI, :nom, :unite, :cal, :l, :g, :p, :idM)");


		$req->bindparam(":idI", $idI);
		$req->bindparam(":nom", $pNom);
		$req->bindparam(":unite", $pUnite);
		$req->bindparam(":cal", $pCalories);
		$req->bindparam(":l", $pLipides);
		$req->bindparam(":g", $pGlucides);
		$req->bindparam(":p", $pProtides);
		$req->bindparam(":idM", $pId_media);

		$req->execute();

		return $req;
	}

	public static function getById($pIdI) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM ingredient WHERE id_ingredient=:idI');
		$req->bindparam(':idI', $pIdI);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$ing = new Ingredient($d['ID_INGREDIENT'], $d['NOM'], $d['UNITE'], $d['CALORIES'], $d['LIPIDES'], $d['GLUCIDES'], $d['PROTIDES'], $d['ID_MEDIA']);
			return $ing;
		}
		else {
			return null;
		}
	}

	public static function getAll() {
		$ingredients = array();

		$bdd = parent::getInstance();
		$req = $bdd->requete('SELECT * FROM ingredient');

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$ingredients[] = new Ingredient($d['ID_INGREDIENT'], $d['NOM'], $d['UNITE'], $d['CALORIES'], $d['LIPIDES'], $d['GLUCIDES'], $d['PROTIDES'], $d['ID_MEDIA']);
		}

		return $ingredients;	
	}
}
