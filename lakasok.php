<?php
include_once 'menu.php';
include_once 'lekerdezesek.php';

echo menu();

$conn = connect();

if(ISSET($_POST["submit"])) {
	if(ISSET($_POST["lakasszam"]) && ISSET($_POST["m2"]) && ISSET($_POST["emelet"]) && ISSET($_POST["szobak_szama"]) 
		&& ISSET($_POST["gepesitett"]) && ISSET($_POST["epuletszam"])){
		$lakasszam = $_POST["lakasszam"];
		$m2 = $_POST["m2"];
		$emelet = $_POST["emelet"];
		$szobak_szama = $_POST["szobak_szama"];
		$gepesitett = $_POST["gepesitett"];
		$epuletszam = $_POST["epuletszam"];
		
		insertLakas($lakasszam, $m2, $emelet, $szobak_szama, $gepesitett, $epuletszam);

	} else {
		error_log("Valamelyik mező nincs kitöltve!");
	}
}

?>
<form method="POST">
Lakásszám:
<input type="text" name="lakasszam"/>
<br/>
m2:
<input type="text" name="m2"/>
<br/>
Emelet:
<input type="text" name="emelet"/>
<br/>
Szobák száma:
<input type="text" name="szobak_szama"/>
<br/>
Gépesített:
<select name="gepesitett">
	<option disabled selected value>--select--</option>
		<option value="Igen">Igen</option>
		<option value="Nem">Nem</option>
</select>
	<br/>
		Épületszám:
		<select name="epuletszam">
			<option disabled selected value> -- select an option -- </option>
				
				<?php
				$sql = "SELECT epuletszam FROM epulet";
				$res = mysqli_query($conn, $sql) or die ('Hibás utasítás: '.mysqli_error($conn));
				 
				while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
					$epuletszam = $current_row["epuletszam"];
					echo '<option value='.$epuletszam.'>'.$epuletszam.'</option>';
				}
				?>				
		</select>
	<br/>
<input type="submit" name="submit" value="Létrehoz"/>
</form>

<h1>Lakások listája</h1>

<table border="1">
<tr>
<th>Lakásszám</th>
<th>m2</th>
<th>Emelet</th>
<th>Szobák száma</th>
<th>Gépesített-e</th>
<th>Épületszám</th>
</tr>

<?php

    $lakasok = getLakasList();

    while( $egySor = mysqli_fetch_assoc($lakasok) ) { 
        echo '<tr>';
        echo '<form action=lakasquery.php method=POST>';
		echo sprintf("<td>". "<input type=text name=lakasszam readonly value='%s'></td>",htmlspecialchars($egySor['lakasszam']));
		echo sprintf("<td>". "<input type=text name=m2 value='%s'></td>",htmlspecialchars($egySor['m2']));
		echo sprintf("<td>". "<input type=text name=emelet value='%s'></td>",htmlspecialchars($egySor['emelet']));
		echo sprintf("<td>". "<input type=text name=szobak_szama value='%s'></td>",htmlspecialchars($egySor['szobak_szama']));
		echo sprintf("<td>". "<input type=text name=gepesitett value='%s'></td>",htmlspecialchars($egySor['gepesitett']));
		echo sprintf("<td>". "<input type=text name=epuletszam readonly value='%s'></td>",htmlspecialchars($egySor['epuletszam']));
		echo sprintf("<td>". "<input type=hidden name=selected value='%s'></td>",htmlspecialchars($egySor['lakasszam']));
        echo "<td>". '<input type=submit name=edit value=Módosít />' ."</td>";
        echo "<td>". '<input type=submit name=delete value=Töröl />' ."</td>";
		echo '</form>';
        echo '</tr>';
    } 
    mysqli_free_result($lakasok);
?>
</table>