<?php

require_once 'models/planning.php';

class Controller_Planning {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function creation() {
		$BASEURL = $this->context['BASEURL'];

	}
	public function listePlannings() {
		$BASEURL = $this->context['BASEURL'];

		include 'views/liste_des_plannings.php';
	}
}
