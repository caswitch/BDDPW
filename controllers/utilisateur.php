<?php

require_once 'models/utilisateur.php';

class Controller_Utilisateur {

	public function __construct() {}

	public function inscription() {
		// Vérification des données entrées dans le formulaire
		if (isset($_POST["inscrismoi"])) {
			if (empty($_POST['login']) ||  empty($_POST['pwd']) || empty($_POST['pwd_v']) || empty($_POST['email'])) {
				echo '<script language="javascript">';
				echo 'alert("Veuillez remplir tous les champs.")';
				echo '</script>';
			}
			elseif ($_POST['pwd'] != $_POST['pwd_v']) {
				echo '<script language="javascript">';
				echo 'alert("Le mot de passe et sa confirmation ne correspondent pas.")';
				echo '</script>';
			}
			else {
				Utilisateur::inscription($_POST['login'], $_POST['email'], $_POST['pwd']);
				$_SESSION['message'] = 'Bienvenue sur ratatouille ! ^^'; 
				header('Location: '.BASEURL.'/index.php');
				exit();
			}
		}
		 
 		include 'views/inscription.php';
	}

	public function connexion() {
		if (Utilisateur::est_connecte()) {
			echo '<script language="javascript">';
			echo 'alert("Vous êtes déjà connecté.")';
			echo '</script>';
		} 
		else {
			Utilisateur::connexion($_POST['login'], $_POST['email']);
			header('Location: '.BASEURL.'/index.php');
			include 'views/connexion.php';
		}
	}

	public function deconnexion() {		
		if (!Utilisateur::est_connecte()) {
			echo '<script language="javascript">';
			echo 'alert("Vous n\'êtes pas encore connecté.")';
			echo '</script>';
		}
		else {
			$_SESSION['message'] = 'Vous êtes déconnecté'; 
			Utilisateur::deconnexion();
			header('Location: '.BASEURL.'/index.php');
			exit();
		} 
	}
}
