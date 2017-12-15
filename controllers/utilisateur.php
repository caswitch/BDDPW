<?php

require_once 'models/utilisateur.php';

class Controller_Utilisateur {
	private $context;

	public function __construct($ctx) {
		$this->context = $ctx;
	}

	public function inscription() {
		$BASEURL = $this->context['BASEURL'];
		// Vérification des données entrées dans le formulaire
		if (isset($_POST["inscrismoi"])) {
			if (empty($_POST['login']) ||  empty($_POST['pwd']) || empty($_POST['pwd_v']) || empty($_POST['email'])) {
				echo '<script language="javascript">';
				echo 'alert("Tous les champs ne sont pas remplis ! 😱\nMais tout va bien, tu peux encore les remplir. 😃")';
				echo '</script>';
			}
			elseif ($_POST['pwd'] != $_POST['pwd_v']) {
				echo '<script language="javascript">';
				echo 'alert("Le mot de passe et sa confirmation ne correspondent pas. 😢\nEssaye encore ! 😉")';
				echo '</script>';
			}
			else {
				Utilisateur::inscription($_POST['login'], $_POST['email'], $_POST['pwd']);
				$_SESSION['message'] = 'Bienvenue sur ratatouille ! 😊'; 
				$BASEURL = dirname($_SERVER['SCRIPT_NAME']);
				$home = 'Location: '.$BASEURL.'/index.php';
				header($home);
				exit();
			}
		}
		 
 		include 'views/inscription.php';
	}

	public function connexion() {
		$BASEURL = $this->context['BASEURL'];
		if (Utilisateur::est_connecte()) {
			echo '<script language="javascript">';
			echo 'alert("Tu es déjà en cuisine, petit rat. 😁")';
			echo '</script>';
		} 
		else {
			if (isset($_POST["connectemoi"])) {
				if (empty($_POST['pwd'])) {
					echo '<script language="javascript">';
					echo 'alert("Veuillez renseigner votre pseudo ou mail et votre mot de passe pour vous connecter.")';
					echo '</script>';
				}
				else if (!empty($_POST['login'])) {
					Utilisateur::connexion($_POST['login'], "");
				}
				else if (!empty($_POST['email'])) {
					Utilisateur::connexion("", $_POST['email']);
				}

				$_SESSION['message'] = 'En cuisine ! 😋'; 

				$home = 'Location: '.$BASEURL.'/index.php';
				header($home);
			}

			include 'views/connexion.php';
		}
	}

	public function deconnexion() {		
		$BASEURL = $this->context['BASEURL'];
		if (!Utilisateur::est_connecte()) {
			echo '<script language="javascript">';
			echo 'alert("Vous n\'êtes pas encore connecté.")';
			echo '</script>';
		}
		else {
			$_SESSION['message'] = 'À la prochaine ! 😘'; 
			Utilisateur::deconnexion();
			$home = 'Location: '.$BASEURL.'/index.php';
			header($home);
			exit();
		} 
	}
}
