<?php

function addUser($pdo,$lastname,$firstname,$mail,$phone,$adress,$zipCode,$city){
	$req=$pdo->prepare('INSERT INTO clients(lastname,firstname,mail,phone,adress,zipCode,city)VALUES(:lastN,:firstN,:mail,:phone,:adress,:zipC,:city)');
	$req->execute(array(
		'lastN'=>$lastname,
		'firstN'=>$firstname,
		'mail'=>$mail,
		'phone'=>$phone,
		'adress'=>$adress,
		'zipC'=>$zipCode,
		'city'=>$city
		));
}