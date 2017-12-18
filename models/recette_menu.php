<?php

require_once(dirname(__FILE__).'/bdd.php');

class Recette_menu extends Bdd {
	private $id_menu;
	private $id_recette;

	public function __construct($pIdMenu, $pIdRecette) {
		$this->id_menu = $pIdMenu;
		$this->id_recette = $pIdRecette;
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

	public function setIdRecette($pIdRecette) {
		$pIdRecette = (int) $pIdRecette;

		if ($pIdRecette > 0) {
			$this->id_recette = $pIdRecette;
		}
	}

	public function getIdRecette() {
		return $this->id_recette;
	}
}
