<?php
/*------title de la page------*/
$title='Ajouter un client';

/*-----------gestion formulaire--------*/
if(isset($_POST['Send'])) {
	/*------------verif donnee form---------*/
	/*------nom--------*/
	if(empty($_POST['lastname'])) {
		$errors['lastname']='Veuillez entrer un nom';
	}else if(strlen($_POST['lastname'])<2) {
		$errors['lastname']='Veuillez entrer un nom';
	}

	/*------prenom--------*/
	if(empty($_POST['firstname'])) {
		$errors['firstname']='Veuillez entrer un nom';
	}else if(strlen($_POST['lastname'])<2) {
		$errors['firstname']='Veuillez entrer un nom';
	}

	/*------mail--------*/
	if(empty($_POST['mail'])) {
		$errors['mail']='Veuillez entrer un mail';
	}else if(!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
		$errors['mail']='Veuillez entrer un mail valide';
	}

	/*--------phone-----*/
	if(empty($_POST['phone'])) {
		$errors['phone']='Veuillez entrer un numéro de téléphone';
	}else if(!is_numeric($_POST['phone']) || strlen($_POST['phone']<10)) {
		$errors['phone']='Veuillez entrer un numero de téléphone valide';
	}

	/*------adress--------*/
	if(empty($_POST['adress'])) {
		$errors['adress']='Veuillez entrer une adresse';
	}else if(strlen($_POST['adress'])<4) {
		$errors['adress']='Veuillez entrer une adresse valide';
	}
 	
 	/*--------code postal-----*/
	if(empty($_POST['zipCode'])) {
		$errors['zipCode']='Veuillez entrer un code postal';
	}else if(!is_numeric($_POST['zipCode']) || strlen($_POST['zipCode']!=5)) {
		$errors['zipCode']='Veuillez entrer un code postal valide';
	}

	/*------ville--------*/
	if(empty($_POST['city'])) {
		$errors['city']='Veuillez entrer une ville';
	}else if(strlen($_POST['lastname'])<2) {
		$errors['city']='Veuillez entrer une ville de plus de 2 lettres';
	}

	print_r($errors);
}
/*------la page--------*/
include('header.php');
?>
<main>
	<h2>Ajouter un client</h2>
	<form method="POST" action="#">
		<fieldset>
			<legend>Client</legend>
			<label for="lastname">Nom:</label><input type="text" name="lastname" id="lastname"/><br>
			<label for="firstname">Prenom:</label><input type="text" name="firstname" id="firstname"/><br>
			<label for="mail">Email:</label><input type="text" name="mail" id="mail"/><br>
			<label for="phone">Tel:</label><input type="text" name="phone" id="phone"/><br>
		</fieldset>
		<fieldset>
			<legend>Adresse</legend>
			<label for="adress">Adresse:</label><input type="text" name="adress" id="adress"/><br>
			<label for="zipCode">Code postal:</label><input type="text" name="zipCode" id="zipCode"/><br>
			<label for="city">Ville:</label><input type="text" name="city" id="city"/><br>
		</fieldset>
		<input type="submit" name="Send" value="Enregistrer">
	</form>
</main>
<?php
include('footer.php');
?>