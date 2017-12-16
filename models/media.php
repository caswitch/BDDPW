<?php

require_once(dirname(__FILE__).'/bdd.php');

class Media extends Bdd {
	private $id_media;
	private $typ;
	private $url;
	private $legende;

	public function __construct($pId_media, $pTyp, $pUrl, $pLeg) {
		$this->id_media  = $pId_media;
		$this->typ       = $pTyp;
		$this->url       = $pUrl;
		$this->legende   = $pLeg;
	}

	/* Accesseurs */

	public function setIdMedia($pIdM) {
		$pIdM = (int) $pIdM;

		if ($pIdM > 0) {
			$this->id_media = $pIdM;
		}
	}

	public function getIdMedia() {
		return $this->id_media;
	}

	public function setTyp($pTyp) {
		$this->typ = $pTyp;
	}

	public function getTyp() {
		return $this->typ;
	}

	public function setUrl($pUrl) {
		$this->url = $pUrl;
	}

	public function getUrl() {
		return $this->url;
	}

	public function setLegende($pLeg) {
		$this->legende = $pLeg;
	}

	public function getLegende() {
		return $this->legende;
	}

	public static function nextIdMedia() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_media) FROM media");
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

	public static function creation($pTyp, $pUrl, $pLeg) {
		$idM = self::nextIdMedia();

		$bdd = parent::getInstance();

		if (empty($pLeg)) {
			$req = $bdd->preparation("INSERT INTO media (ID_MEDIA,TYPE,URL)	VALUES (:idM, :type, :url)");

		}
		else {
			$req = $bdd->preparation("INSERT INTO media VALUES (:idM, :type, :url, :legende)");
			$req->bindparam(":legende", $pLeg);
		}

		$req->bindparam(":idM", $idM);
		$req->bindparam(":type", $pTyp);
		$req->bindparam(":url", $pUrl);

		$req->execute();

		return $req;
	}

	public static function getById($pIdM) {
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM media WHERE id_media=:idM');
		$req->bindparam(':idM', $pIdM);
		$req->execute();

		if($d = $req->fetch(PDO::FETCH_ASSOC)) {}
			$media = new Media($d['ID_MEDIA'], $d['TYPE'], $d['URL'], $d['LEGENDE']);
			return $media;
		}
		else {
			return null;
		}
	}
}
