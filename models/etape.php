<?php

require_once(dirname(__FILE__).'/bdd.php');

class Etape extends Bdd {
	private $id_etape;
	private $numero;
	private $descr;
	private $duree;
	private $id_recette;
	private $id_media;
	
	public function __construct($pId_etape, $pNumero, $pDescription, $pDuree, $pId_recette, $pId_media) {

		$this->id_etape    = $pId_etape; 
		$this->numero      = $pNumero;
		$this->descr       = $pDescription;
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
		$this->descr = $pDescription;
	}

	public function getDescription() {
		return $this->descr;
	}

	public function setDuree($pDuree) {
		$this->duree = $pDuree;
	}

	public function getDuree() {
		return $this->duree;
	}

	public function setIdRecette($pIdRecette) {
		$this->id_recette = $pIdRecette;
	}

	public function getIdRecette() {
		return $this->id_recette;
	}

	public function setIdMedia($pIdMedia) {
		$this->id_media = $pIdMedia;
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

	public static function creation($pNumero, $pDescr, $pDuree, $pId_recette, $pId_media) {

		$idE = self::nextIdEtape();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO etape 
			VALUES (:idEt, :numero, :descr, :duree, :id_recette, :id_media)");
		$req->bindparam(":idEt", $idE);
		$req->bindparam(":numero", $pNumero);
		$req->bindparam(":descr", $pDescr);
		$req->bindparam(":duree", $pDuree);
		$req->bindparam(":id_recette", $pId_recette);
		$req->bindparam(":id_media", $pId_media);

		$req->execute();

		return $req;
	}

	public static function getById($pIdE) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM etape WHERE id_etape=:idEt');
		$req->bindparam(':idEt', $pIdE);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {}
			$et = new Etape($d['ID_ETAPE'], $d['NUMERO'], $d['DESCRIPTION'], $d['DUREE'], $d['ID_RECETTE'], $d['ID_MEDIA']);
			return $et;
		}
		else {
			return null;
		}
	}
}
