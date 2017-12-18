<?php

require_once(dirname(__FILE__).'/bdd.php');

class Planning extends Bdd {
	private $id_planning;
	private $expiration;
	private $id_utilisateur;

	public function __construct($pExpiration, $pId_utilisateur) {
		$this->id_planning    = self::nextIdPlanning(); 
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

	public function addRecette($idRecette) {
		// todo
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
		$req = $bdd->requete("SELECT max(id_planning) FROM planning");
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

	public function inject() {
		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO planning 
			VALUES (:idPl, to_date(:exp, 'RRRR-MM-DD'), :idU)");

		$req->bindparam(":idPl", $this->id_planning);
		$req->bindparam(":exp", $this->expiration);
		$req->bindparam(":idU", $this->id_utilisateur);

		$retour = $req->execute();

		return $retour;
	}

	public static function getById($pIdP) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM Planning WHERE id_planning=:idPl');
		$req->bindparam(':idPl', $pIdP);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			// var_dump($d);
			$p = new Planning($d['ID_PLANNING'], $d['EXPIRATION'], $d['ID_UTILISATEUR']);
			return $p;
		}
		else {
			return null;
		}
	}

	public static function getByUtilisateur($pIdU) {
		$plannings = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM planning where id_utilisateur=:idUtilisateur');
		$req->bindparam(':idUtilisateur', $pIdU);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$plannings[] = new Planning($d['ID_PLANNING'], $d['EXPIRATION'], $d['ID_UTILISATEUR']);
		}

		return $plannings;	
	}

	public static function getByUtilisateurDate($pIdU, $pAsc) {
		$plannings = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM planning where id_utilisateur=:idUtilisateur order by expiration :asc_desc');
		$req->bindparam(':idUtilisateur', $pIdU);
		$req->bindparam(':asc_desc', $pAsc);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$plannings[] = new Planning($d['ID_PLANNING'], $d['EXPIRATION'], $d['ID_UTILISATEUR']);
		}

		return $plannings;	
	}

}
