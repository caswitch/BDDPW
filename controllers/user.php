<?php


class Controller_User {
	public function __construct() {}

	public function inscription() {
		include 'views/inscription.php'; 
	}

	public function connexion() {
		if (isset($_SESSION['connect'])) { 
			echo 'Vous êtes déja connecté.';
		} 
		else { 
			include 'views/connexion.php'; 
		}
	}

	public function deconnexion() {		
		if (!isset($_SESSION['connect'])) { 
			echo "Vous n'êtes pas connecté."; } 
		else { 
			$_SESSION['message']='Vous êtes déconnecté'; 
	       	unset($_SESSION['connect']); 
			header('Location: '.BASEURL.'/index.php'); 
			exit(); 
		} 
	}

	public function connexion_valide() {
		if (isset($_SESSION['connect'])) { 
			$content='Vous êtes déja connecté.'; 
		} 
		else { 
			if ($_POST['nom']=='Scott' && $_POST['password']=='PWD_Scott') { 
				echo 'Vous êtes connecté.'; 
				$_SESSION['connect']=true;
			}
			else { 
				echo 'Login ou mot de passe incorrect.';
			}
		}
	}
}

