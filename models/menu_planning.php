<?php

require_once(dirname(__FILE__).'/bdd.php');

class Menu_planning extends Bdd {
	private $id_menu;
	private $id_planning;

	public function __construct($pId_menu, $pId_planning) {
		$this->id_menu = $pId_menu;
		$this->id_planning    = $pId_planning;
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
}
