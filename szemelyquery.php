<?php

include_once 'lekerdezesek.php';

if(!($conn = connect())) {
	return false;
}

$adoszam = $_POST["adoszam"];
$nev = $_POST["nev"];
$email = $_POST["email"];
$telefonszam = $_POST["telefonszam"];
$selected = $_POST["selected"];

if(ISSET($_POST["edit"]) && !empty($adoszam) && !empty($nev) && !empty($email) && !empty($telefonszam)) {
	editSzemely($adoszam, $nev, $email, $telefonszam, $selected);
	header("Location: szemelyek.php");
}

if(ISSET($_POST["delete"])) {
	deleteSzemely($selected);
	header("Location: szemelyek.php");
}
?>