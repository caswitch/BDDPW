<?php

require_once(dirname(__FILE__).'/bdd.php');

class Utilisateur extends Bdd {
	static private $id_utilisateur;
	private $login;
	private $email;
	private $email_v = true;
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

	public function nextIdUtilisateur() {
		$req = self::$bdd->requete("SELECT max(id_utilisateur) FROM recette");
		$id = $req->fetchColumn(0);
		if ($id) {
			$id = (int) $id;
			$id++;
		}
		else {
			$id = 1;
		}
		return $id;
	}

	public function inscription($pLogin, $pEmail, $pPwd) {
		$idU = self::nextIdUtilisateur();
		$emailV = true;
		$req = self::$bdd->prepare("INSERT INTO utilisateur 
									VALUES (:idU, :login, :email, :email_v, :mdp)");

		$req->bindparam(":idU",$idU);
		$req->bindparam(":login",$pLogin);
		$req->bindparam(":email",$pEmail);
		$req->bindparam(":email_v",$emailV);
		$req->bindparam(":mdp",$pPwd);

		$req->execute();

		return $req;
    }
/*TODO: à revoir */

	 public function connexion($uname, $umail, $upass) {
		$req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE login=:login OR email=:email LIMIT 1");
		$req->bindparam(":login",$this->login);
		$req->bindparam(":email",$this->email);

		$req->execute();

		$row = $req->fetch(PDO::FETCH_ASSOC);

		if ($req->rowCount() > 0) {
			if (password_verify($upass, $row['mdp'])) {
				$_SESSION['login'] = $row['id_utilisateur'];
				return true;
			}
			return false;
		}
   }

	public function est_connecte() {
		if (isset($_SESSION['login'])) {
			return true;
		}
	}

	public function deconnexion() {
		session_destroy();
		unset($_SESSION['login']);

		return true;
	}

}
?>
