<?php

include_once 'lekerdezesek.php';

if(!($conn = connect())) {
	return false;
}

$lakasszam = $_POST["lakasszam"];
$m2 = $_POST["m2"];
$emelet = $_POST["emelet"];
$szobak_szama = $_POST["szobak_szama"];
$gepesitett = $_POST["gepesitett"];
$epuletszam = $_POST["epuletszam"];
$selected = $_POST["selected"];

if(ISSET($_POST["edit"]) && !empty($lakasszam) && !empty($m2) && !empty($emelet) && !empty($szobak_szama) && !empty($gepesitett) && !empty($epuletszam)) {
	editLakas($lakasszam, $m2, $emelet, $szobak_szama, $gepesitett, $epuletszam, $selected);
	header("Location: lakasok.php");
}

if(ISSET($_POST["delete"])) {
	deleteLakas($selected);
	header("Location: lakasok.php");
}
?>