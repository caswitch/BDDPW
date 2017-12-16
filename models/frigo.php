<?php

require_once(dirname(__FILE__).'/bdd.php');

class Frigo extends Bdd {
	private $quantite;
	private $id_utilisateur;
	private $id_ingredient;

	public function __construct($pQuantite, $pId_utilisateur, $pId_ingredient) {
		$this->quantite       = $pQuantite; 
		$this->id_utilisateur = $pId_utilisateur;
		$this->id_ingredient  = $pId_ingredient;
	}

	/* Accesseurs */

	public function setQuantite($pQuantite) {
		$this->quantite = $pQuantite;
	}

	public function getQuantite() {
		return $this->quantite;
	}

	public function setIdUtilisateur($pIdUtilisateur) {
		$this->id_utilisateur = $pIdUtilisateur;
	}

	public function getIdUtilisateur() {
		return $this->id_utilisateur;
	}

	public function setIdIngredient($pIdIngredient) {
		$this->id_ingredient = $pIdIngredient;
	}

	public function getIdIngredient() {
		return $this->id_ingredient;
	}

	public static function creation($pQuantite, $pId_utilisateur, $pId_ingredient) {

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO Frigo VALUES (:qua, :idUt, :idIn)");
		$req->bindparam(":qua", $pQuantite);
		$req->bindparam(":idUt", $pId_utilisateur);
		$req->bindparam(":idIn", $pId_ingredient);

		$req->execute();

		return $req;
	}
}
