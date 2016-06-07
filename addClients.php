<?php

/*------------inclusion-------------*/
require_once('connect.php');
require_once('functions.php');


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
		$errors['firstname']='Veuillez entrer un prenom';
	}else if(strlen($_POST['firstname'])<2) {
		$errors['firstname']='Veuillez entrer un nom';
	}

	/*------mail--------*/
	// if(empty($_POST['mail'])) {
	// 	$errors['mail']='Veuillez entrer un mail';
	// }else if(!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
	// 	$errors['mail']='Veuillez entrer un mail valide';
	// }

	/*--------phone-----*/
	if(empty($_POST['phone'])) {
		$errors['phone']='Veuillez entrer un numéro de téléphone';
	}else{
		if(!is_numeric($_POST['phone']) || strlen($_POST['phone'])!=10){
		$errors['phone']='Veuillez entrer un numero de téléphone valide';
	}
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
	}else{
		if(!is_numeric($_POST['zipCode']) || strlen($_POST['zipCode'])!=5){
		$errors['zipCode']='Veuillez entrer un code postal valide';
	}
	}

	/*------ville--------*/
	if(empty($_POST['city'])) {
		$errors['city']='Veuillez entrer une ville';
	}else if(strlen($_POST['city'])<2) {
		$errors['city']='Veuillez entrer une ville de plus de 2 lettres';
	}
	/*--------------traitement donnees-------------*/

	$lastname=trim(ucfirst(strtolower($_POST['lastname'])));
	$firstname=trim(ucfirst(strtolower($_POST['firstname'])));
	$mail=trim($_POST['mail']);
	$phone=trim($_POST['phone']);
	$adress=trim($_POST['adress']);
	$zipCode=trim($_POST['zipCode']);
	$city=trim(ucfirst(strtolower($_POST['city'])));
	/*------ajout client dans bdd-----*/

	if(!isset($errors)) {
		addUser($pdo,$lastname,$firstname,$mail,$phone,$adress,$zipCode,$city);
	}
}
/*------la page--------*/
include('header.php');
?>
<main>
	<h2>Ajouter un client</h2>
	<form method="POST" action="#">
		<fieldset>
			<legend>Client</legend>
			<label for="lastname">Nom:</label>
			<input type="text" name="lastname" id="lastname" value="<?php if(isset($errors)){echo $_POST['lastname'];} ?>"/><br/>
			<label for="firstname">Prenom:</label>
			<input type="text" name="firstname" id="firstname" value="<?php if(isset($errors)){echo $_POST['firstname'];} ?>"/><br>
			<label for="mail">Email:</label>
			<input type="text" name="mail" id="mail" value="<?php if(isset($errors)){echo $_POST['mail'];} ?>"/><br>
			<label for="phone">Tel:</label>
			<input type="text" name="phone" id="phone" value="<?php if(isset($errors)){echo $_POST['phone'];} ?>"/><br>
		</fieldset>
		<fieldset>
			<legend>Coordonnées</legend>
			<label for="adress">Adresse:</label>
			<input type="text" name="adress" id="adress" value="<?php if(isset($errors)){echo $_POST['adress'];} ?>"/><br>
			<label for="zipCode">Code postal:</label>
			<input type="text" name="zipCode" id="zipCode" value="<?php if(isset($errors)){echo $_POST['zipCode'];} ?>"/><br>
			<label for="city">Ville:</label><input type="text" name="city" id="city" value="<?php if(isset($errors)){echo $_POST['city'];} ?>"/><br>
		</fieldset>
		<input type="submit" name="Send" value="Enregistrer">
	</form>
	<?php
		if(isset($_POST['Send'])){
			if(isset($errors)) {
			echo '<ul>';
			foreach ($errors as $key => $value) {
				echo '<li>'.$value.'</li>';
			}
			echo '</ul>';
			}else{
				echo '<p style="color:green">Nouveau client ajouté</p>';
			}
		}
	?>
</main>
<?php
include('footer.php');
?>