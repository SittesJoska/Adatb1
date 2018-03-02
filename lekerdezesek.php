<?php

function connect(){
	$conn = mysqli_connect("localhost", "root", "") or die("Nem sikerült csatlakozni!");
	mysqli_select_db($conn, "ingatlanok" );
	
	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');
	
	return $conn;
}

//Helység
function getHelysegList(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$result = mysqli_query($conn,"SELECT iranyitoszam, helyseg_nev FROM helyseg ORDER BY iranyitoszam");
	
	mysqli_close($conn);
	
	return $result;
}

function insertHelyseg($iranyitoszam, $helyseg_nev){
	
	if(!($conn = connect())){
		return false;
	}
	
	$insert = mysqli_prepare($conn, "INSERT INTO helyseg (`iranyitoszam`, `helyseg_nev`) VALUES (?, ?)");
	
	mysqli_stmt_bind_param($insert, "ds", $iranyitoszam, $helyseg_nev);
	
	$result = mysqli_stmt_execute($insert);
	
	mysqli_close($conn);
	
	return $result;
}

function editHelyseg($iranyitoszam, $helyseg_nev, $selected){
	
	if(!($conn = connect())){
		return false;
	}
	
	$update = mysqli_prepare($conn, "UPDATE helyseg SET iranyitoszam = ?, helyseg_nev = ? WHERE iranyitoszam = ?");
	
	mysqli_stmt_bind_param($update, "dsd", $iranyitoszam, $helyseg_nev, $selected);
	
	$result = mysqli_stmt_execute($update);
		
	mysqli_close($conn);
	
	return $result;
}

function deleteHelyseg($selected) {
	
	if(!($conn = connect())){
		return false;
	}
	
	$delete = mysqli_prepare($conn, "DELETE FROM helyseg WHERE iranyitoszam = ?");
	
	mysqli_stmt_bind_param($delete, "d", $selected);
	
	$result = mysqli_stmt_execute($delete);
	
	mysqli_close($conn);
	
	return $result;
}

//Telek
function getTelekList(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$result = mysqli_query($conn,"SELECT telek_id, m2, utca, hazszam, iranyitoszam FROM telek ORDER BY telek_id");
	
	mysqli_close($conn);
	
	return $result;
}

function insertTelek($telek_id, $m2, $utca, $hazszam, $iranyitoszam){
	
	if(!($conn = connect())){
		return false;
	}
	
	$insert = mysqli_prepare($conn, "INSERT INTO telek (`telek_id`, `m2`, `utca`, `hazszam`, `iranyitoszam`) VALUES (?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($insert, "ddsdd", $telek_id, $m2, $utca, $hazszam, $iranyitoszam);
	
	$result = mysqli_stmt_execute($insert);
	
	mysqli_close($conn);
	
	return $result;
}

function editTelek($telek_id, $m2, $utca, $hazszam, $iranyitoszam, $selected){
	
	if(!($conn = connect())){
		return false;
	}
	
	$update = mysqli_prepare($conn, "UPDATE telek SET telek_id = ?, m2 = ?, utca = ?, hazszam = ?, iranyitoszam = ? WHERE telek_id = ?");
	
	mysqli_stmt_bind_param($update, "ddsddd", $telek_id, $m2, $utca, $hazszam, $iranyitoszam, $selected);
	
	$result = mysqli_stmt_execute($update);
		
	mysqli_close($conn);
	
	return $result;
}

function deleteTelek($selected) {
	
	if(!($conn = connect())){
		return false;
	}
	
	$delete = mysqli_prepare($conn, "DELETE FROM telek WHERE telek_id = ?");
	
	mysqli_stmt_bind_param($delete, "d", $selected);
	
	$result = mysqli_stmt_execute($delete);
	
	mysqli_close($conn);
	
	return $result;
}

//Épület
function getEpuletList(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$result = mysqli_query($conn,"SELECT epuletszam, m2, epites_eve, emeletek_szama, telek_id FROM epulet ORDER BY epuletszam");
	
	mysqli_close($conn);
	
	return $result;
}

function insertEpulet($epuletszam, $m2, $epites_eve, $emeletek_szama, $telek_id){
	
	if(!($conn = connect())){
		return false;
	}
	
	$insert = mysqli_prepare($conn, "INSERT INTO epulet (`epuletszam`, `m2`, `epites_eve`, `emeletek_szama`, `telek_id`) VALUES (?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($insert, "ddddd", $epuletszam, $m2, $epites_eve, $emeletek_szama, $telek_id);
	
	$result = mysqli_stmt_execute($insert);
	
	mysqli_close($conn);
	
	return $result;
}

function editEpulet($epuletszam, $m2, $epites_eve, $emeletek_szama, $telek_id, $selected){
	
	if(!($conn = connect())){
		return false;
	}
	
	$update = mysqli_prepare($conn, "UPDATE epulet SET epuletszam = ?, m2 = ?, epites_eve = ?, emeletek_szama = ?, telek_id = ? WHERE epuletszam = ?");
	
	mysqli_stmt_bind_param($update, "ddsddd", $epuletszam, $m2, $epites_eve, $emeletek_szama, $telek_id, $selected);
	
	$result = mysqli_stmt_execute($update);
		
	mysqli_close($conn);
	
	return $result;
}

function deleteEpulet($selected) {
	
	if(!($conn = connect())){
		return false;
	}
	
	$delete = mysqli_prepare($conn, "DELETE FROM epulet WHERE epuletszam = ?");
	
	mysqli_stmt_bind_param($delete, "d", $selected);
	
	$result = mysqli_stmt_execute($delete);
	
	mysqli_close($conn);
	
	return $result;
}

//Lakás
function getLakasList(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$result = mysqli_query($conn,"SELECT lakasszam, m2, emelet, szobak_szama, gepesitett, epuletszam FROM lakas ORDER BY lakasszam");
	
	mysqli_close($conn);
	
	return $result;
}

function insertLakas($lakasszam, $m2, $emelet, $szobak_szama, $gepesitett, $epuletszam){
	
	if(!($conn = connect())){
		return false;
	}
	
	$insert = mysqli_prepare($conn, "INSERT INTO lakas (`lakasszam`, `m2`, `emelet`, `szobak_szama`, `gepesitett`, `epuletszam`) VALUES (?, ?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($insert, "ddddsd", $lakasszam, $m2, $emelet, $szobak_szama, $gepesitett, $epuletszam);
	
	$result = mysqli_stmt_execute($insert);
	
	mysqli_close($conn);
	
	return $result;
}

function editLakas($lakasszam, $m2, $emelet, $szobak_szama, $gepesitett, $epuletszam, $selected){
	
	if(!($conn = connect())){
		return false;
	}
	
	$update = mysqli_prepare($conn, "UPDATE lakas SET lakasszam = ?, m2 = ?, emelet = ?, szobak_szama = ?, gepesitett = ?, epuletszam = ? WHERE lakasszam = ?");
	
	mysqli_stmt_bind_param($update, "ddddsdd", $lakasszam, $m2, $emelet, $szobak_szama, $gepesitett, $epuletszam, $selected);
	
	$result = mysqli_stmt_execute($update);
		
	mysqli_close($conn);
	
	return $result;
}

function deleteLakas($selected) {
	
	if(!($conn = connect())){
		return false;
	}
	
	$delete = mysqli_prepare($conn, "DELETE FROM lakas WHERE lakasszam = ?");
	
	mysqli_stmt_bind_param($delete, "d", $selected);
	
	$result = mysqli_stmt_execute($delete);
	
	mysqli_close($conn);
	
	return $result;
}

//Személy
function getSzemelyList(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$result = mysqli_query($conn,"SELECT adoszam, nev, email, telefonszam FROM szemely ORDER BY nev");
	
	mysqli_close($conn);
	
	return $result;
}

function insertSzemely($adoszam, $nev, $email, $telefonszam){
	
	if(!($conn = connect())){
		return false;
	}
	
	$insert = mysqli_prepare($conn, "INSERT INTO szemely (`adoszam`, `nev`, `email`, `telefonszam`) VALUES (?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($insert, "dssd", $adoszam, $nev, $email, $telefonszam);
	
	$result = mysqli_stmt_execute($insert);
	
	mysqli_close($conn);
	
	return $result;
}

function editSzemely($adoszam, $nev, $email, $telefonszam, $selected){
	
	if(!($conn = connect())){
		return false;
	}
	
	$update = mysqli_prepare($conn, "UPDATE szemely SET adoszam = ?, nev = ?, email = ?, telefonszam = ? WHERE adoszam = ?");
	
	mysqli_stmt_bind_param($update, "dssdd", $adoszam, $nev, $email, $telefonszam, $selected);
	
	$result = mysqli_stmt_execute($update);
		
	mysqli_close($conn);
	
	return $result;
}

function deleteSzemely($selected) {
	
	if(!($conn = connect())){
		return false;
	}
	
	$delete = mysqli_prepare($conn, "DELETE FROM szemely WHERE adoszam = ?");
	
	mysqli_stmt_bind_param($delete, "d", $selected);
	
	$result = mysqli_stmt_execute($delete);
	
	mysqli_close($conn);
	
	return $result;
}

//Bérlés

function getBerlesList(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$result = mysqli_query($conn,"SELECT berleti_dij, berles_kezdete, berles_vege, adoszam, lakasszam FROM berles ORDER BY adoszam");
	
	mysqli_close($conn);
	
	return $result;
}

function insertBerles($berleti_dij, $berles_kezdete, $berles_vege, $adoszam, $lakasszam){
	
	if(!($conn = connect())){
		return false;
	}
	
	$check = mysqli_query($conn,"SELECT berleti_dij, berles_kezdete, berles_vege, adoszam, lakasszam FROM berles WHERE adoszam = '".$adoszam."' and lakasszam = '".$lakasszam."'");
		
	if(mysqli_num_rows($check) != 0){
		echo "A megadott személy már bérli a kiválasztott lakást!";
		return false;
	}
	
	$insert = mysqli_prepare($conn, "INSERT INTO berles (`berleti_dij`, `berles_kezdete`, `berles_vege`, `adoszam`, `lakasszam`) VALUES (?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($insert, "dssdd", $berleti_dij, $berles_kezdete, $berles_vege, $adoszam, $lakasszam);
	
	$result = mysqli_stmt_execute($insert);
	
	mysqli_close($conn);
	
	return $result;
}

function editBerles($berleti_dij, $berles_kezdete, $berles_vege, $adoszam, $lakasszam, $selected1, $selected2){
	
	if(!($conn = connect())){
		return false;
	}
	
	$update = mysqli_prepare($conn, "UPDATE berles SET berleti_dij = ?, berles_kezdete = ?, berles_vege = ?, adoszam = ?, lakasszam = ? WHERE adoszam = ? and lakasszam = ?");
	
	mysqli_stmt_bind_param($update, "dssdddd", $berleti_dij, $berles_kezdete, $berles_vege, $adoszam, $lakasszam, $selected1, $selected2);
	
	$result = mysqli_stmt_execute($update);
		
	mysqli_close($conn);
	
	return $result;
}

function deleteBerles($selected1, $selected2) {
	
	if(!($conn = connect())){
		return false;
	}
	
	$delete = mysqli_prepare($conn, "DELETE FROM berles WHERE adoszam = ? and lakasszam = ?");
	
	mysqli_stmt_bind_param($delete, "dd", $selected1, $selected2);
	
	$result = mysqli_stmt_execute($delete);
	
	mysqli_close($conn);
	
	return $result;
}

//Összetett query-k

function query1(){

	if(!($conn = connect())){
		return false;
	}
	
	$query = mysqli_query($conn, "SELECT SUM(berleti_dij) AS berleti_sum, telek.telek_id AS telek_sum FROM berles 
		INNER JOIN lakas ON berles.lakasszam = lakas.lakasszam 
		INNER JOIN epulet ON lakas.epuletszam = epulet.epuletszam 
		INNER JOIN telek ON epulet.telek_id = telek.telek_id 
		GROUP BY telek.telek_id ORDER BY telek.telek_id");
	
	mysqli_close($conn);
	
	return $query;
}

function query2(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$query = mysqli_query($conn, "SELECT COUNT(lakasszam) AS lakas_count, telek.utca AS telek_utca FROM lakas 
		INNER JOIN epulet ON lakas.epuletszam = epulet.epuletszam 
		INNER JOIN telek ON epulet.telek_id = telek.telek_id 
		GROUP BY telek.utca ORDER BY lakas_count");
	
	mysqli_close($conn);
	
	return $query;
}

function allekerdezes(){
	
	if(!($conn = connect())){
		return false;
	}
	
	$query = mysqli_query($conn, "SELECT nev AS szemely_nev, MAX(berleti_dij) AS max_berleti FROM szemely, berles WHERE szemely.adoszam 
		IN (SELECT adoszam FROM berles WHERE berleti_dij > (SELECT AVG(berleti_dij) FROM berles)) 
		GROUP BY szemely.adoszam");
	
	mysqli_close($conn);
	
	return $query;
	
}

?>