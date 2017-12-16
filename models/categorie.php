<?php

require_once(dirname(__FILE__).'/bdd.php');

class Categorie extends Bdd {
	private $id_categorie;
	private $nom;
	private $categorie_pere;

	public function __construct($pId_categorie, $pNom, $pCategorie_pere) {
		$this->id_categorie   = $pId_categorie  
		$this->nom            = $pNom           
		$this->categorie_pere = $pCategorie_pere
	}

	/* Accesseurs */

	public function setIdCategorie($pIdC) {
		$pIdC = (int) $pIdC;

		if ($pIdC > 0) {
			$this->id_categorie = $pIdC;
		}
	}

	public function getIdCategorie() {
		return $this->id_categorie;
	}

	public function setNom($pNom) {
		$this->nom = $pNom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setParent($pCategorie_pere) {
		$this->categorie_pere = $pCategorie_pere;
	}

	public function getParent() {
		return $this->categorie_pere;
	}

	public static function nextIdCategorie() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_categorie) FROM categorie");
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

	public static function creation($pNom, $pCategorie_pere) {
		$idC = self::nextIdCategorie();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO categorie 
			VALUES (:idC, :nom, :p)");
		$req->bindparam(":idC", $idC);
		$req->bindparam(":nom", $pNom);
		$req->bindparam(":p", $pCategorie_pere);

		$req->execute();

		return $req;
	}

	public static function getById($pIdC) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM categorie WHERE id_categorie=:idC');
		$req->bindparam(':idC', $pIdC);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {}
			$c = new Categorie($d['ID_CATEGORIE'], $d['NOM'], $d['CATEGORIE_PERE']);
			return $c;
		}
		else {
			return null;
		}
	}
}
