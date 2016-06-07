<?php

/*------------inclusion-------------*/
require_once('connect.php');
require_once('functions.php');


/*------title de la page------*/
$title='Ajouter une auto';

/*------la page--------*/
include('header.php');
?>
<main>
	<form method="POST" action="#">
		<label for="matricule">N°immatriculation</label>
		<input type="text" name="matricule" id="matricule" />
		
	</form>
</main>
<?php
include('footer.php');
?>