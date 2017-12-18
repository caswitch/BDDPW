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

	public static function getQuantite($pIdR, $pIdI) {
		$bdd = parent::getInstance();

		$req = $bdd->preparation('SELECT quantite FROM recette_ingredient WHERE id_recette=:idRec and id_ingredient=:idIng');
		$req->bindparam(':idRec', $pIdR);
		$req->bindparam(':idIng', $pIdI);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$quantite = $d['QUANTITE'];

			return $quantite;
		}
		else {
			return null;
		}
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

	public static function getIngredientByIdRecette($pIdR) {
		$r_i = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM recette_ingredient WHERE id_recette=:idRe');
		$req->bindparam(':idRe', $pIdR);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = new Recette_ingredient($d['QUANTITE'], $d['ID_RECETTE'], $d['ID_INGREDIENT']);
		}

		return $r_i;
	}

	public static function getRecetteByIdIngredient($pIdI) {
		$r_i = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT id_recette FROM recette_ingredient WHERE id_ingredient=:idIn');
		$req->bindparam(':idIn', $pIdI);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = new Recette_ingredient($d['QUANTITE'], $d['ID_RECETTE'], $d['ID_INGREDIENT']);
		}

		return $r_i;
	}

	public static function getIdIngredientByIdRecette($pIdR) {
		$r_i = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM recette_ingredient WHERE id_recette=:idRe');
		$req->bindparam(':idRe', $pIdR);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = $d['ID_INGREDIENT'];
		}

		return $r_i;
	}

	public static function getIdRecetteByIdIngredient($pIdI) {
		$r_i = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT id_recette FROM recette_ingredient WHERE id_ingredient=:idIn');
		$req->bindparam(':idIn', $pIdI);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = $d['ID_RECETTE'];
		}

		return $r_i;
	}

	public static function getIdRecetteByIdIngredients($pIdIs) {
		$r_i = array();

		$bdd = parent::getInstance();

		// Nombre d'ingrédients recherchés
		$i = 0;
		$sql;

		foreach ($pIdIs as $idI) {
			if ($i == 0) {
				$sql = $sql."SELECT id_recette FROM recette_ingredient WHERE id_ingredient=".$idI;
			}
			else {
				$sql = $sql."INTERSECT SELECT id_recette FROM recette_ingredient WHERE id_ingredient=".$idI;
			}
			$i++;
		}

		$req = $bdd->requete($sql);

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = $d['ID_RECETTE'];
		}

		return $r_i;
	}

	public static function getIdRecetteByIdIngTrie($pIdIng, $pOrderBy, $pAsc) {

		$r_i = array();

		$bdd = parent::getInstance();
		$sql = "SELECT id_recette FROM recette WHERE id_recette IN (SELECT id_recette FROM recette_ingredient WHERE id_ingredient=:idIng) ORDER BY ".$pOrderBy." ".$pAsc;
		$req = $bdd->preparation($sql);
		$req->bindparam(':idIng', $pIdIng);
		//$req->bindparam(':OrderBy', $pOrderBy);
		//$req->bindparam(':asc_desc', $pAsc);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = $d['ID_RECETTE'];
		}

		return $r_i;
	}

	public static function getIdRecetteByIdIngsTrie($pIdIngs, $pOrderBy, $pAsc) {
		$r_i = array();

		$bdd = parent::getInstance();

		// Nombre d'ingrédients recherchés
		$i = 0;
		$sql;

		foreach ($pIdIngs as $idI) {
			if ($i == 0) {
				$sql = $sql."SELECT id_recette FROM recette_ingredient WHERE id_ingredient=".$idI;
			}
			else {
				$sql = $sql."INTERSECT SELECT id_recette FROM recette_ingredient WHERE id_ingredient=".$idI;
			}
			$i++;
		}

		$sql_entier = "SELECT id_recette FROM recette WHERE id_recette IN (".$sql.") ORDER BY ".$pOrderBy." ".$pAsc;

		$req = $bdd->requete($sql_entier);

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$r_i[] = $d['ID_RECETTE'];
		}

		return $r_i;
	}
}
