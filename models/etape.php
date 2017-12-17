<?php

require_once(dirname(__FILE__).'/bdd.php');

class Etape extends Bdd {
	private $id_etape;
	private $numero;
	private $description;
	private $duree;
	private $id_recette;
	private $id_media;

	public function __construct($pId_etape, $pNumero, $pDescription, $pDuree, $pId_recette, $pId_media) {
		$this->id_etape    = $pId_etape;
		$this->numero      = $pNumero;
		$this->description = $pDescription;
		$this->duree       = $pDuree;
		$this->id_recette  = $pId_recette;
		$this->id_media    = $pId_media;
	}

	/* Accesseurs */

	public function setIdEtape($pIdE) {
		$pIdE = (int) $pIdE;

		if ($pIdE > 0) {
			$this->id_etape = $pIdE;
		}
	}

	public function getIdEtape() {
		return $this->id_etape;
	}

	public function setNumero($pNumero) {
		$this->numero = $pNumero;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setDescription($pDescription) {
		$this->description = $pDescription;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDuree($pDuree) {
		$this->duree = $pDuree;
	}

	public function getDuree() {
		return $this->duree;
	}

	public function setIdRecette($pIdR) {
		$this->id_recette = $pIdR;
	}

	public function getIdRecette() {
		return $this->id_recette;
	}

	public function setIdMedia($pIdM) {
		$this->id_media = $pIdM;
	}

	public function getIdMedia() {
		return $this->id_media;
	}

	public static function nextIdEtape() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_etape) FROM etape");
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

	public static function creation($pNumero, $pDescription, $pDuree, $pId_recette, $pId_media) {
		$idEt = self::nextIdEtape();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO etape VALUES (:idEt, :numero, :descr, :duree, :idRe, :idMe)");

		$req->bindparam(":idEt", $idEt);
		$req->bindparam(":numero", $pNumero);
		$req->bindparam(":descr", $pDescription);
		$req->bindparam(":duree", $pDuree);
		$req->bindparam(":idRe", $pId_recette);
		$req->bindparam(":idMe", $pId_media);

		$req->execute();

		return $req;
	}

	public static function getById($pIdE) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM etape WHERE id_etape=:idEt');
		$req->bindparam(':idEt', $pIdE);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$etape = new Etape($d['ID_ETAPE'], $d['NUMERO'], $d['DESCRIPTION'], $d['DUREE'], $d['ID_RECETTE'], $d['ID_MEDIA']);
			return $etape;
		}
		else {
			return null;
		}
	}

	public static function getByMedia($pIdM) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM etape WHERE id_media=:idMe');
		$req->bindparam(':idMe', $pIdM);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$etape = new Etape($d['ID_ETAPE'], $d['NUMERO'], $d['DESCRIPTION'], $d['DUREE'], $d['ID_RECETTE'], $d['ID_MEDIA']);
			return $etape;
		}
		else {
			return null;
		}
	}

	public static function getByRecette($pIdR) {
		$etapes = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM recette where id_recette=:idRe');
		$req->bindparam(':idRe', $pIdR);
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$etapes[] = new Etape($d['ID_ETAPE'], $d['NUMERO'], $d['DESCRIPTION'], $d['DUREE'], $d['ID_RECETTE'], $d['ID_MEDIA']);
		}

		return $etapes;	
	}
}

