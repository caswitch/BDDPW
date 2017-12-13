<?php

require_once('bdd.php');

class User {
	static private $bdd;

	static private $id_utilisateur;
	private $login;
	private $email;
	private $email_verifie = true;
	private $mdp;
	

	function __construct($pLogin, $pEmail, $pMdp) {
		$this->bdd	 = Bdd::getInstance();
		$this->login = pLogin;
		$this->email = pEmail;
		$this->mdp	 = pMdp;
	}

	public function inscription() {
		$req = $this->bdd->prepare("INSERT INTO utilisateur (login,email,email_verifie,mdp) 
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
