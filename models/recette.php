<?php

require_once(dirname(__FILE__).'/bdd.php');

class Recette extends Bdd {
	private $id_recette;
	private $nom;
	private $description;
	private $difficulte;
	private $prix;
	private $nb_pers;
	private $id_utilisateur;
	private $id_media;

	public function __construct($pId_recette, $pNom, $pDescription, $pDifficulte, $pPrix, $pNb_pers, $pId_utilisateur, $pId_media) {
		$this->id_recette = $pId_recette;
		$this->nom = $pNom;
		$this->description = $pDescription;
		$this->difficulte = $pDifficulte;
		$this->prix = $pPrix;
		$this->nb_pers = $pNb_pers;
		$this->id_utilisateur = $pId_utilisateur;
		$this->id_media = $pId_media;
	}

	/* Accesseurs */

	public function setIdRecette($pIdR) {
		$pIdR = (int) $pIdR;

		if ($pIdR > 0) {
			$this->id_recette = $pIdR;
		}
	}

	public function getIdRecette() {
		return $this->id_recette;
	}

	public function setNom($pNom) {
		$this->nom = $pNom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setDescription($pDescription) {
		$this->description = $pDescription;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDifficulte($pDifficulte) {
		$this->difficulte = $pDifficulte;
	}

	public function getDifficulte() {
		return $this->difficulte;
	}

	public function setPrix($pPrix) {
		$this->prix = $pPrix;
	}

	public function getPrix() {
		return $this->prix;
	}

	public function setNb_pers($pNb_pers) {
		$this->nb_pers = $pNb_pers;
	}

	public function getNb_pers() {
		return $this->nb_pers;
	}

	public function setIdUtilisateur($pIdU) {
		$this->id_utilisateur = $pIdU;
	}

	public function getIdUtilisateur() {
		return $this->id_utilisateur;
	}

	public function setIdMedia($pIdM) {
		$this->id_media = $pIdM;
	}

	public function getIdMedia() {
		return $this->id_media;
	}

	public static function nextIdRecette() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_recette) FROM recette");
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

	public static function creation($pNom, $pDescription, $pDifficulte, $pPrix, $pNb_pers, $pId_utilisateur, $pId_media) {
		$idR = self::nextIdRecette();

		$bdd = parent::getInstance();



		$req = $bdd->preparation("INSERT INTO recette VALUES (:idR, :nom, :descr, :diff, :prix, :nb_pers, :idU, :idM)");
		$req->bindparam(":idR", $idR);
		$req->bindparam(":nom", $pNom);
		$req->bindparam(":descr", $pDescription);
		$req->bindparam(":diff", $pDifficulte);
		$req->bindparam(":prix", $pPrix);
		$req->bindparam(":nb_pers", $pNb_pers);
		$req->bindparam(":idU", $pId_utilisateur);
		$req->bindparam(":idM", $pId_media);

		$req->execute();

		return $req;
	}

	public static function getById($pIdR) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM recette WHERE id_recette=:idR');
		$req->bindparam(':idR', $pIdR);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$recette = new Recette($d['ID_RECETTE'], $d['NOM'], $d['DESCRIPTION'], $d['DIFFICULTE'], $d['PRIX'], $d['NB_PERS'], $d['ID_UTILISATEUR'], $d['ID_MEDIA']);
			return $recette;
		}
		else {
			return null;
		}
	}

	public static function getAll() {
		$recettes = array();

		$bdd = parent::getInstance();
		$req = $bdd->requete('SELECT * FROM recette');

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$recettes[] = new Recette($d['ID_RECETTE'], $d['NOM'], $d['DESCRIPTION'], $d['DIFFICULTE'], $d['PRIX'], $d['NB_PERS'], $d['ID_UTILISATEUR'], $d['ID_MEDIA']);
		}

		return $recettes;	
	}
}

