<?php

include_once 'lekerdezesek.php';

if(!($conn = connect())) {
	return false;
}

$telek_id = $_POST["telek_id"];
$m2 = $_POST["m2"];
$utca = $_POST["utca"];
$hazszam = $_POST["hazszam"];
$iranyitoszam = $_POST["iranyitoszam"];
$selected = $_POST["selected"];

if(ISSET($_POST["edit"]) && !empty($telek_id) && !empty($m2) && !empty($utca) && !empty($hazszam) && !empty($iranyitoszam)) {
	editTelek($telek_id, $m2, $utca, $hazszam, $iranyitoszam, $selected);
	header("Location: telkek.php");
}

if(ISSET($_POST["delete"])) {
	deleteTelek($selected);
	header("Location: telkek.php");
}
?>