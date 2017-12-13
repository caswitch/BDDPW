<?php

require_once 'models/bdd.php';

class Recette {
	private $bdd;

	private $id_recette;
	private $nom;
	private $description;
	private $difficulte;
	private $prix;
	private $nb_pers;
	private $id_utilisateur;
	private $id_media;

	public function __construct($pId_recette, $pNom, $pDescription, $pDifficulte, $pPrix, $pNb_pers, $pId_utilisateur, $pId_media) {
		$this->bdd = Bdd::getInstance(); 

		$this->id_recette = pId_recette;
		$this->nom = pNom;
		$this->description = pDescription;
		$this->difficulte = pDifficulte;
		$this->prix = pPrix;
		$this->nb_pers = pNb_pers;
		$this->id_utilisateur = pId_utilisateur;
		$this->id_media = pId_media;
	}

	public function setIdRecette() {
		$req = $this->bdd->requete("SELECT max(id_recette) FROM recette");
		$id = $req->fetchColumn(0);
		if ($id) {
			$id = (int) $id;
			$id++;
		}
		else {
			$id = 1;
		}

		$this->id_recette = $i;
	}

	public function getIdRecette() {
		return $this->id_recette;
	}

	public function setNom($pNom) {
		$this->pNom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setDescription($pDescription) {
		$this->description;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDifficulte($pDifficulte) {
		$this->difficulte;
	}

	public function getDifficulte() {
		return $this->difficulte;
	}

	public function setPrix($pPrix) {
		$this->prix;
	}

	public function getPrix() {
		return $this->prix;
	}

	public function setNb_pers($pNb_pers) {
		$this->nb_pers;
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

	public static function create($pNom, $pDescription, $pDifficulte, $pPrix, $pNb_pers, $pId_utilisateur, $pId_media) {
		$idR = getIdRecette();

		$recette = new Recette($idR, $pNom, $pDescription, $pDifficulte, $pPrix, $pNb_pers, $pId_utilisateur, $pId_media);

		$recette = new Recette(1,$titre,$difficulte,$dateAjout);

		$req = self::$bdd->prepare("INSERT INTO recette	VALUES (:id_r, :nom, :desc, :diff, :prix, :nb_pers, :id_u, :id_m)");
		$req->bindparam(":id_r",$idR);
		$req->bindparam(":nom",$pNom);
		$req->bindparam(":desc",$pDescription);
		$req->bindparam(":diff",$pDifficulte);
		$req->bindparam(":prix",$pPrix);
		$req->bindparam(":nb_pers",$pNb_pers);
		$req->bindparam(":id_u",$pId_utilisateur);
		$req->bindparam(":id_m",$pId_media);

		$req->execute();

		return $req;
	}

	public static function getById($idR) {
 		$idR = (int) $idR;

		$req = self::$bdd->prepare('SELECT * FROM recette WHERE id_recette = :id');
		$req->bindValue(':id', $idR, PDO::PARAM_INT);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$recette = new Recette($d['ID_RECETTE'], $d['NOM'], $d['DESCRIPTION'], $d['DIFFICULTE'], $d['PRIX'], $d['NB_PERS'], $d['ID_UTILISATEUR'], $d['ID_MEDIA']);
			return $recette;
		} else {
			return null; }
	}

	public static function getAll() {
		$recettes = array();

		$req = self::$bdd->prepare('SELECT * FROM recette');
		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$recettes[] = new Recette($d['ID_RECETTE'], $d['NOM'], $d['DESCRIPTION'], $d['DIFFICULTE'], $d['PRIX'], $d['NB_PERS'], $d['ID_UTILISATEUR'], $d['ID_MEDIA']);
		}

		return $recettes;	
	}
}

