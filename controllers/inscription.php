<?php

include(dirname(__FILE__).'/../models/utilisateur.php');

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
	}
}
 
include(dirname(__FILE__).'/../views/inscription.php');
/*
require_once 'models/recette.php';

class Controller_Utilisateur {
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
 */
