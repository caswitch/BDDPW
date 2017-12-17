<?php

require_once(dirname(__FILE__).'/bdd.php');

class Recette_ingredient extends Bdd {
	private $quantite;
	private $id_recette;
	private $id_ingredient;

	public function __construct($pQuantite, $pIdR, $pIdI) {
		$this->quantite      = $pQuantite; 
		$this->id_recette    = $pIdR;
		$this->id_ingredient = $pIdI;
	}

	/* Accesseurs */

	public function setQuantite($pQuantite) {
		$this->Quantite = $pQuantite;
	}

	public function getQuantite() {
		return $this->Quantite;
	}

	public function setIdRecette($pIdR) {
		$this->id_recette = $pIdR;
	}

	public function getIdRecette() {
		return $this->IdR;
	}

	public function setIdIngredient($pIdI) {
		$this->id_ingredient = $pIdI;
	}

	public function getIdIngredient() {
		return $this->IdI;
	}

	// Renvoie le nombre d'ingrédients dans la base
	// Ce nombre correspont au plus grand 
	public static function nombreElementsDansTable() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT count(*) FROM recette_ingredient");
		$nbr = $req->fetchColumn(0);

		return $nbr;
	}

	public static function creation($pQuantite, $pIdR, $pIdI) {
		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO recette_ingredient VALUES (:quant, :idRe, :idIn)");
		$req->bindparam(":quant", $pQuantite);
		$req->bindparam(":idRe", $pIdR);
		$req->bindparam(":idIn", $pIdI);

		$req->execute();

		return $req;
	}

	public static function getByRecette($pIdR) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM Regime WHERE id_recette=:idRe');
		$req->bindparam(':idRe', $pIdR);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r = new Recette_ingredient($d['QUANTITE'], $d['ID_RECETTE'], $d['ID_INGREDIENT']);
			return $r;
		}
		else {
			return null;
		}
	}

	public static function getByIngredient($pIdI) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM Regime WHERE id_ingredient=:idIn');
		$req->bindparam(':idIn', $pIdI);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r = new Recette_ingredient($d['QUANTITE'], $d['ID_RECETTE'], $d['ID_INGREDIENT']);
			return $r;
		}
		else {
			return null;
		}
	}
}
