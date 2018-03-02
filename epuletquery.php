<?php

include_once 'lekerdezesek.php';

if(!($conn = connect())) {
	return false;
}

$epuletszam = $_POST["epuletszam"];
$m2 = $_POST["m2"];
$epites_eve = $_POST["epites_eve"];
$emeletek_szama = $_POST["emeletek_szama"];
$telek_id = $_POST["telek_id"];
$selected = $_POST["selected"];

if(ISSET($_POST["edit"]) && !empty($epuletszam) && !empty($m2) && !empty($epites_eve) && !empty($emeletek_szama) && !empty($telek_id)) {
	editEpulet($epuletszam, $m2, $epites_eve, $emeletek_szama, $telek_id, $selected);
	header("Location: epuletek.php");
}

if(ISSET($_POST["delete"])) {
	deleteEpulet($selected);
	header("Location: epuletek.php");
}
?>