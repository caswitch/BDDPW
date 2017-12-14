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

	public function inscription($pLogin, $pEmail, $pPwd, $pPwd_v) {
		if ($pPwd != $pPwd_v) {

		}

		$req = self::$bdd->prepare("INSERT INTO utilisateur (login,email,email_verifie,mdp) 
									VALUES (:login, :email, :email_v, :mdp)");

		$req->bindparam(":login",$this->login);
		$req->bindparam(":email",$this->email);
		$req->bindparam(":email_v",$this->email_verifie);
		$req->bindparam(":mdp",$this->mdp);

		$req->execute();

		return $req;
    }

	 public function connexion($uname, $umail, $upass) {
		$req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE login=:login OR email=:email LIMIT 1");
		$req->bindparam(":login",$this->login);
		$req->bindparam(":email",$this->email);

		//$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
		$req->execute();

		$row = $req->fetch(PDO::FETCH_ASSOC);

		if ($req->rowCount() > 0) {
			if (password_verify($upass, $row['user_pass'])) {
				$_SESSION['user_session'] = $row['id_utilisateur'];
				return true;
			}
			return false;
		}
   }

	public function est_connecte() {
		if(isset($_SESSION['user_session'])) {
			return true;
		}
	}

	public function deconnexion() {
		session_destroy();
		unset($_SESSION['user_session']);

		return true;
	}

}
?>
