<?php

require_once(dirname(__FILE__).'/bdd.php');

class Categorie_exclut_regime extends Bdd {
	private $id_categorie;
	private $id_regime;

	public function __construct($pId_categorie, $pId_regime) {
		$this->id_categorie = $pId_categorie;
		$this->id_regime    = $pId_regime;
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

	public function setIdRegime($pIdReg) {
		$pIdReg = (int) $pIdReg;

		if ($pIdReg > 0) {
			$this->id_regime = $pIdReg;
		}
	}

	public function getIdRegime() {
		return $this->id_regime;
	}
}
