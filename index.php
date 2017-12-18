<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */
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
session_start(); 

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
				$c = new $controller_name(array('BASEURL' => $BASEURL));
				if (method_exists($c, $method)) {
					$found = true;
					call_user_func_array(array($c, $method), $params);
				}
			}
		}
	}

	if (!$found) {
		echo "<div class=\"alert alert-danger\" role=\"alert\">Page indisponible 😞</div>";
	}
}

$content = ob_get_clean();


?>

<?php
 include 'views/header.php';
?>



<body>

<?php
 include 'views/nav.php';
?>


<!-- Index Content -->
<div class="container">
	<div class="page-header">
		<h1 class="my-4">La cuisine de Ratatouille
			<small>Le plus mignon des petits chefs.</small>
		</h1>
	</div>

	<p class="text-center">
		<?php echo $content ?>
	</p>

	<?php 
	if (isset($_SESSION['message'])) { ?>
	<div class="alert alert-info">
	<?php
		 echo $_SESSION['message'];
		 unset($_SESSION['message']);
	?>
	</div>
	<?php } ?>


	<br/>
	<br/>
	<br/>
	<br/>
	<div class="row justify-content-end-center">
		<div class="col-md-8 col-md-offset-2">
			<!-- Carousel   -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img class="first-slide" src="<?php echo $BASEURL ?>/img/carousselle1.png" alt="First slide">
					</div>
					<div class="item">
						<img class="second-slide" src="<?php echo $BASEURL ?>/img/carousselle2.png" alt="Second slide">
					</div>
					<div class="item">
						<img class="third-slide" src="<?php echo $BASEURL ?>/img/carousselle3.png" alt="Third slide">
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
<br/>
<br/>

<?php
 include 'views/footer.php';
?>
</body>
</html>
