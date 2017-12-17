<p>Les informations demandées dans le formulaire suivant sont nécessaires afin de poursuivre votre inscription.</p>
<!--
 <script type="text/javascript">
	 function validateForm() {
		var login = document.forms["Form_i]["login"].value;
		var pwd = document.forms["Form_i]["pwd"].value;
		var pwd_v = document.forms["Form_i]["pwd_v"].value;
		var email = document.forms["Form_i]["email"].value;
		if (a == null || a == "" , b == null || b == "" , 
			c == null || c == "", d == null || d == "") {
			 alert("Veuillez remplir tous les champs, s'il-vous-plaît.");
			 return false;
		}
		else if (pwd != pwd_v) {
			 alert("Le mot de passe et sa confirmation ne correspondent pas.");
			 return false;

		}
}
 </script>
-->
<!--<form name="Form_i" onsubmit="return validateForm()" action="" method="post">-->
<form action="" method="post">
	<label>Pseudo : <input type="text" name="login"/></label><br/>
	<label>Mot de passe : <input type="password" name="pwd"/></label><br/>
	<label>Confirmation du mot de passe : <input type="password" name="pwd_v"/></label><br/>
	<label>Adresse e-mail : <input type="text" name="email"/></label><br/>
	<input type="submit" name="inscrismoi" value="M'inscrire"/>
</form>
