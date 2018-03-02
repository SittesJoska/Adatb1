<?php

include_once 'lekerdezesek.php';

if(!($conn = connect())) {
	return false;
}

$iranyitoszam = $_POST["iranyitoszam"];
$nev = $_POST["helyseg_nev"];
$selected = $_POST["selected"];

if(ISSET($_POST["edit"]) && !empty($iranyitoszam) && !empty($nev)) {
	editHelyseg($iranyitoszam, $nev, $selected);
	header("Location: helysegek.php");
}

if(ISSET($_POST["delete"])) {
	deleteHelyseg($selected);
	header("Location: helysegek.php");
}
?>