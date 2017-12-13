<?php
class Bdd {
	private static $connect = null;
	private $bdd;

	private function __construct() {
		$dns = "oci:dbname=//osr-oracle.unistra.fr:1521/osr";
		$login = "kommer";             
		$pwd = "H1pP0p074M3SQL";
		 
		try {
			$this->bdd = new PDO($dns,$login,$pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
		echo 'connexion reussie';
	}

	public static function getInstance() {
		if(is_null(self::$connect)) {
			self::$connect = new Bdd(); 
		}
		return self::$connect;
	}
 
	public function requete($req){
		$query = $this->bdd->query($req);
		return $query;
	}

	public function prepare($req){
		$query = $this->bdd->prepare($req);
		return $query;
	}

	public function execute($query){
		$req = $query->execute();
		return $req;
	}

	public function fetch($result) {
		return $result->fetch();
	}

	public function close($result){
		return $result->closeCursor();
	}

}
?>
