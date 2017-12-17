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
				$password = $_POST['pwd'];
				//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				Utilisateur::inscription($_POST['login'], $_POST['email'], $password);
				//Utilisateur::inscription($_POST['login'], $_POST['email'], $hashed_password);
				$_SESSION['message'] = 'Bienvenue sur ratatouille ! 😊'; 
				$home = 'Location: '.$BASEURL.'/index.php';
				header($home);
				exit();
				return;
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
				else if (!empty($_POST['login']) || !empty($POST['email'])) {
					//$password = $_POST['pwd'];
					//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
					//if (password_verify($password, $hashed_password)) {
						$utilisateur = Utilisateur::connexion($_POST['login'], "", $_POST['pwd']);
					//}
					//else {
					//	echo '<script language="javascript">';
					//	echo 'alert("Le mot de passe ne correspont pas.")';
					//	echo '</script>';
					//}	
				}
				else if (!empty($_POST['email'])) {
					//if (password_verify($password, $hashed_password)) {
						$utilisateur = Utilisateur::connexion("", $_POST['email'], $_POST['pwd']);
					//}
					//else {
					//	echo '<script language="javascript">';
					//	echo 'alert("Le mot de passe ne correspont pas.")';
					//	echo '</script>';
					//}
				}

				if (!is_null($utilisateur)) {
					$_SESSION['message'] = 'En cuisine ! 😋'; 

					$home = 'Location: '.$BASEURL.'/index.php';
					header($home);
					exit();
				}
				else {
					echo '<script language="javascript">';
					echo 'alert("Informations renseignées incorrectes. 😔")';
					echo '</script>';
				}
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
