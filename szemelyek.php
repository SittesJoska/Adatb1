<?php
include_once 'menu.php';
include_once 'lekerdezesek.php';

echo menu();

$conn = connect();

if(ISSET($_POST["submit"])) {
	if(ISSET($_POST["adoszam"]) && ISSET($_POST["nev"]) && ISSET($_POST["email"]) && ISSET($_POST["telefonszam"])){
		$adoszam = $_POST["adoszam"];
		$nev = $_POST["nev"];
		$email = $_POST["email"];
		$telefonszam = $_POST["telefonszam"];
		
		insertSzemely($adoszam, $nev, $email, $telefonszam);

	} else {
		error_log("Valamelyik mező nincs kitöltve!");
	}
}

?>
<form method="POST">
Adószám:
<input type="text" name="adoszam"/>
<br/>
Név:
<input type="text" name="nev"/>
<br/>
E-mail:
<input type="text" name="email"/>
<br/>
Telefonszám:
<input type="text" name="telefonszam"/>
<br/>
<input type="submit" name="submit" value="Létrehoz"/>
</form>

<h1>Lakások listája</h1>

<table border="1">
<tr>
<th>Adószám</th>
<th>Név</th>
<th>E-mail</th>
<th>Telefonszám</th>
</tr>

<?php

    $szemelyek = getSzemelyList();

    while( $egySor = mysqli_fetch_assoc($szemelyek) ) { 
        echo '<tr>';
        echo '<form action=szemelyquery.php method=POST>';
		echo sprintf("<td>". "<input type=text name=adoszam readonly value='%s'></td>",htmlspecialchars($egySor['adoszam']));
		echo sprintf("<td>". "<input type=text name=nev value='%s'></td>",htmlspecialchars($egySor['nev']));
		echo sprintf("<td>". "<input type=text name=email value='%s'></td>",htmlspecialchars($egySor['email']));
		echo sprintf("<td>". "<input type=text name=telefonszam value='%s'></td>",htmlspecialchars($egySor['telefonszam']));
		echo sprintf("<td>". "<input type=hidden name=selected value='%s'></td>",htmlspecialchars($egySor['adoszam']));
        echo "<td>". '<input type=submit name=edit value=Módosít />' ."</td>";
        echo "<td>". '<input type=submit name=delete value=Töröl />' ."</td>";
		echo '</form>';
        echo '</tr>';
    } 
    mysqli_free_result($szemelyek);
?>
</table>