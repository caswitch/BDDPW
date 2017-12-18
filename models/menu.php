<?php

require_once(dirname(__FILE__).'/bdd.php');

class Menu extends Bdd {
	private $id_menu;
	private $horaire;
	private $typ;

	public function __construct($pHoraire, $pTyp) {
		$this->id_menu = self::nextIdMenu();
		$this->horaire = $pHoraire;
		$this->typ = $pTyp;
	}

	/* Accesseurs */

	public function setIdMenu($pIdMenu) {
		$pIdMenu = (int) $pIdMenu;

		if ($pIdMenu > 0) {
			$this->id_menu = $pIdMenu;
		}
	}

	public function getIdMenu() {
		return $this->id_menu;
	}

	public function setHoraire($pHoraire) {
		$this->id_horaire = $pHoraire;
	}

	public function getHoraire() {
		return $this->horaire;
	}

	public function setTyp($pTyp) {
		$this->typ = $pTyp;
	}

	public function getTyp() {
		return $this->typ;
	}

	public static function nextIdMenu() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_menu) FROM menu");
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

	public static function creation($pHoraire, $pTyp) {
		$idM = self::nextIdMenu();

		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO menu VALUES (:idMenu, :hor, :typ)");

		$req->bindparam(":idMenu", $idM);
		$req->bindparam(":horaire", $pHoraire);
		$req->bindparam(":typ", $pTyp);

		$req->execute();

		return $req;
	}

	public static function getById($pIdM) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM menu WHERE id_menu=:idMenu');
		$req->bindparam(':idMenu', $pIdM);
		$req->execute();

		if ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			// var_dump($d);
			$menu = new Menu($d['ID_MENU'], $d['HORAIRE'], $d['TYPE']);
			return $menu;
		}
		else {
			return null;
		}
	}

	public static function getAll() {
		$menus = array();

		$bdd = parent::getInstance();
		$req = $bdd->requete('SELECT * FROM menu');

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$menus[] = new Menu($d['ID_MENU'], $d['HORAIRE'], $d['TYPE']);
		}

		return $menus;	
	}

}
