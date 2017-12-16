<?php

require_once(dirname(__FILE__).'/bdd.php');

class Regime extends Bdd {
	private $id_regime;
	private $nom;

	public function __construct($pId_Regime, $pNom) {
		$this->id_Regime = $pId_Regime; 
		$this->nom       = $pNom;
	}

	/* Accesseurs */

	public function setIdRegime($pIpR) {
		$pIpR = (int) $pIpR;

		if ($pIpR > 0) {
			$this->id_Regime = $pIpR;
		}
	}

	public function getIdRegime() {
		return $this->id_regime;
	}

	public function setNom($pNom) {
		$this->nom = $pNom;
	}

	public function getNom() {
		return $this->nom;
	}

	public static function nextIdRegime() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_regime) FROM regime");
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

	public static function creation($pNom) {
		$idR = self::nextIdCategorie();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO Regime VALUES (:idre, :nom)");
		$req->bindparam(":idRe", $idR);
		$req->bindparam(":nom", $pNom);

		$req->execute();

		return $req;
	}

	public static function getById($pIdR) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM Regime WHERE id_Regime=:idRe');
		$req->bindparam(':idRe', $pIdR);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {}
			$r = new Regime($d['ID_REGIME'], $d['NOM']);
			return $r;
		}
		else {
			return null;
		}
	}
}
