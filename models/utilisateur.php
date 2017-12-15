<?php

require_once(dirname(__FILE__).'/bdd.php');

class Utilisateur extends Bdd {
	static private $id_utilisateur;
	private $login;
	private $email;
	private $email_v = true;
	// True car nous ne nous sommes pas donné les moyens 
	// d'envoyer un vrai mail à l'utilisateur pour confirmer son
	// inscription
	private $mdp;
	

	function __construct($pId_utilisateur, $pLogin, $pEmail, $pEmail_v, $pMdp) {
		$this->id_utilisateur = pId_utilisateur;
		$this->login = pLogin;
		$this->email = pEmail;
		$this->email_v = pEmail_v;
		$this->mdp = pMdp;
	}

	/* Accesseurs */
	public function getIdU() {
		return $this->id_utilisateur;
	}

	public function setIdU($id) {
		$id = (int) $id;

		if ($id > 0) {
			$this->_id = $id;
		}
	}

	public function getLogin() {
		return $this->login;
	}

	public function setLogin($pLogin) {
			$this->login = $pLogin;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($pEmail) {
			$this->email = $pEmail;
	}

	public function getEmailV() {
		return $this->email_v;
	}

	public function setEmailV($pEmailV) {
			$this->email_v = $pEmailV;
	}

	public function getMdp() {
		return $this->mdp;
	}

	public function setMdp($pMdp) {
			$this->mdp = $pMdp;
	}

	public static function nextIdUtilisateur() {
		$bdd = parent::getInstance();
		$req = $bdd->requete("SELECT max(id_utilisateur) FROM utilisateur");
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

	public static function inscription($pLogin, $pEmail, $pPwd) {
		$idU = self::nextIdUtilisateur();
		$emailV = true;

		$bdd = parent::getInstance();
		$req = $bdd->preparation("INSERT INTO utilisateur 
			VALUES (:idU, :login, :email, :email_v, :mdp)");

		$req->bindparam(":idU", $idU);
		$req->bindparam(":login",$pLogin);
		$req->bindparam(":email",$pEmail);
		$req->bindparam(":email_v",$emailV);
		$req->bindparam(":mdp",$pPwd);

		$req->execute();

		return $req;
    }

	public static function connexion($pLogin, $pEmail) {
		// On regarde si l'utilisateur existe dans la base de données
		$bdd = parent::getInstance();
		$req = $bdd->preparation('SELECT * FROM utilisateur WHERE login = :login or email = :email');
		$req->bindparam(':login', $pLogin);
		$req->bindparam(':email', $pEmail);
		$req->execute();

		$d = $req->fetch(PDO::FETCH_ASSOC);

		if ($req->rowCount() > 0) {
			$_SESSION['login'] = $d['ID_UTILISATEUR'];
			$_SESSION['connect'] = true;
			$user = new Utilisateur($d['ID_UTILISATEUR'], $d['LOGIN'], $d['EMAIL'], $d['EMAIL_VERIFIE'], $d['MDP']);
			return $user;
		}
		else {
			$_SESSION['connect'] = false;
			return null;
		}
	}

	public static function est_connecte() {
		if (isset($_SESSION['connect']) && $_SESSION['connect'] = true) {
			return true;
		}
	}

	public static function deconnexion() {
		session_destroy();
		unset($_SESSION['login']);
		unset($_SESSION['connect']);
	}
}
?>
