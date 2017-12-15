<?php session_start(); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'models/bdd.php';

$BASEURL = dirname($_SERVER['SCRIPT_NAME']);

try {
	// Connexion à la base de données Oracle
	$bdd = Bdd::getInstance();
}
catch(PDOException $e) {
	die('Echec de la connexion : '.$e->getMessage());
}

/*
$req = $bdd->requete("SELECT table_name FROM user_tables");
if (!is_object($req)) {
	echo 'La requête n\'est pas un objet.';
}

while ($donnees = $req->fetch()) { ?>
		<p>
		<strong>TABLE_NAME</strong> :
			<?php 
			print_r($donnees);
			print("\n");
			?>
			<br />
		</p>
<?php
}

$req->closeCursor();

if (!empty($_GET['page']) && is_file('controllers/'.$_GET['page'].'.php')) {
	include 'controllers/'.$_GET['page'].'.php';
}
else {
	include 'controllers/home.php';
}
 */

ob_start();

if (isset($_SERVER['PATH_INFO'])) {
	$args = explode('/', $_SERVER['PATH_INFO']);
	$found = false;

	if (count($args) >= 3) {
		$controller = $args[1];
		$method = $args[2];
		$params = array();
		for ($i=3; $i < count($args); $i++) { 
			$params[] = $args[$i];
		}

		$controller_file = dirname(__FILE__).'/controllers/'.$controller.'.php';
		if (is_file($controller_file)) {
			require_once $controller_file;
			$controller_name = 'Controller_'.ucfirst($controller);
			if (class_exists($controller_name)) {
				$c = new $controller_name;
				if (method_exists($c, $method)) {
					$found = true;
					call_user_func_array(array($c, $method), $params);
				}
			}
		}
	}
  
	if (!$found) {
		echo "<p>Page indisponible</p>";
	}
} else {
		echo "Page principale de l'application de gestion de recettes !";
}

$content = ob_get_clean();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title> Ratatouille </title>

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

	<!--favicons-->
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/manifest.json">
	<link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta name="msapplication-config" content="img/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
	<?php
	 include 'views/nav.php';
	?>

	<p class="text-center">
	<?php
	 if (isset($_SESSION['message'])) { 
		 echo $_SESSION['message'];
		 unset($_SESSION['message']);
	 }
	?>
	</p>

    <!-- Page Content -->
    <div class="container">
	<?php
	 include 'views/header.php';
	?>

	<p class="text-center">
	 <?php echo $content ?>
	</p>


      <div class="row justify-content-end-center">
        <div class="col-md-8 col-md-offset-2">
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/carousselle1.png" alt="First slide">
        </div>
        <div class="item">
          <img class="second-slide" src="img/carousselle2.png" alt="Second slide">
        </div>
        <div class="item">
          <img class="third-slide" src="img/carousselle3.png" alt="Third slide">
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
		</div>
		</div>
      </div>
    </div>


	<?php
	 include 'views/footer.php';
	?>
	 <script
	   src="https://code.jquery.com/jquery-3.2.1.min.js"
		     integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			   crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
