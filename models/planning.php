<?php

require_once(dirname(__FILE__).'/bdd.php');

class Planning extends Bdd {
	private $id_planning;
	private $expiration;
	private $id_utilisateur;

	public function __construct($pId_planning, $pExpiration, $pId_utilisateur) {
		$this->id_planning    = $pId_planning; 
		$this->expiration     = $pExpiration; 
		$this->id_utilisateur = $pId_utilisateur;
	}

	/* Accesseurs */

	public function setIdPlanning($pIdP) {
		$pIdP = (int) $pIdP;

		if ($pIdP > 0) {
			$this->id_planning = $pIdP;
		}
	}

	public function getIdPlanning() {
		return $this->id_planning;
	}

	public function setExpiration($pExpiration) {
		$this->expiration = $pExpiration;
	}

	public function getExpiration() {
		return $this->expiration;
	}

	public function setIdUtilisateur($pIdUtilisateur) {
		$this->id_utilisateur = $pIdUtilisateur;
	}

	public function getIdUtilisateur() {
		return $this->id_utilisateur;
	}


	public static function nextIdPlanning() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_planning) FROM Planning");
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

	public static function creation($pExpiration, $pId_utilisateur) {
		$idP = self::nextIdCategorie();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO Planning 
			VALUES (:idPl, :exp, :idU)");
		$req->bindparam(":idPl", $idP);
		$req->bindparam(":exp", $pExpiration);
		$req->bindparam(":idU", $pId_utilisateur);

		$req->execute();

		return $req;
	}

	public static function getById($pIdP) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM Planning WHERE id_planning=:idPl');
		$req->bindparam(':idPl', $pIdP);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$p = new Planning($d['ID_PLANNING'], $d['EXPIRATION'], $d['ID_UTILISATEUR']);
			return $p;
		}
		else {
			return null;
		}
	}
}
