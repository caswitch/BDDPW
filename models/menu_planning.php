<?php

require_once(dirname(__FILE__).'/bdd.php');

class Menu_planning extends Bdd {
	private $id_menu;
	private $id_planning;

	public function __construct($pId_menu, $pId_planning) {
		$this->id_menu = $pId_menu;
		$this->id_planning = $pId_planning;
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

	public function setIdPlanning($pIdPlanning) {
		$pIdPlanning = (int) $pIdPlanning;

		if ($pIdPlanning > 0) {
			$this->id_planning = $pIdPlanning;
		}
	}

	public function getIdPlanning() {
		return $this->id_planning;
	}

	public function inject() {
		$bdd = parent::getInstance();

		$req = $bdd->preparation("INSERT INTO menu_planning 
			VALUES (:idMenu, :idPlanning)");

		$req->bindparam(":idMenu", $this->id_menu);
		$req->bindparam(":idPlanning", $this->id_planning);

		$retour = $req->execute();

		return $retour;
	}

	public static function getMenuByPlanning($pIdP) {
		$plannings = array();

		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT id_menu FROM menu_planning where id_planning=:idPlanning');
		$req->bindparam(':idPlanning', $pIdP);

		$req->execute();

		while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
			$plannings[] = new Menu_planning($d['ID_MENU'], $d['ID_PLANNING']);
		}

		return $plannings;	
	}

}
