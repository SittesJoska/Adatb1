<?php
include_once 'menu.php';
include_once 'lekerdezesek.php';

echo menu();

echo menu();

$conn = connect();

if(ISSET($_POST["submit"])) {
	if(ISSET($_POST["epuletszam"]) && ISSET($_POST["m2"]) && ISSET($_POST["epites_eve"]) && ISSET($_POST["emeletek_szama"]) 
		&& ISSET($_POST["telek_id"])){
		$epuletszam = $_POST["epuletszam"];
		$m2 = $_POST["m2"];
		$epites_eve = $_POST["epites_eve"];
		$emeletek_szama = $_POST["emeletek_szama"];
		$telek_id = $_POST["telek_id"];
		
		insertEpulet($epuletszam, $m2, $epites_eve, $emeletek_szama, $telek_id);

	} else {
		error_log("Valamelyik mező nincs kitöltve!");
	}
}

?>
<form method="POST">
Épületszám:
<input type="text" name="epuletszam"/>
<br/>
m2:
<input type="text" name="m2"/>
<br/>
Építés éve:
<select name="epites_eve" />
    <?php
        for ($i=1900; $i<2018; $i++) {
            echo '<option value="'.$i.'">'.$i.'</option>';
        }
    ?>
    </select> év
<br/>
Emeletek száma:
<input type="text" name="emeletek_szama"/>
	<br/>
		Telek ID:
		<select name="telek_id">
			<option disabled selected value> -- select an option -- </option>
				
				<?php
				$sql = "SELECT telek_id FROM telek";
				$res = mysqli_query($conn, $sql) or die ('Hibás utasítás: '.mysqli_error($conn));
				 
				while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
					$telek_id = $current_row["telek_id"];
					echo '<option value='.$telek_id.'>'.$telek_id.'</option>';
				}
				?>				
		</select>
<br/>
<input type="submit" name="submit" value="Létrehoz"/>
</form>

<h1>Épületek listája</h1>

<table border="1">
<tr>
<th>Épületszám</th>
<th>m2</th>
<th>Építés éve</th>
<th>Emeletek száma</th>
<th>Telek ID</th>
</tr>

<?php

    $epuletek = getEpuletList();

    while( $egySor = mysqli_fetch_assoc($epuletek) ) { 
        echo '<tr>';
        echo '<form action=epuletquery.php method=POST>';
		echo sprintf("<td>". "<input type=text name=epuletszam readonly value='%s'></td>",htmlspecialchars($egySor['epuletszam']));
		echo sprintf("<td>". "<input type=text name=m2 value='%s'></td>",htmlspecialchars($egySor['m2']));
		echo sprintf("<td>". "<input type=text name=epites_eve value='%s'></td>",htmlspecialchars($egySor['epites_eve']));
		echo sprintf("<td>". "<input type=text name=emeletek_szama value='%s'></td>",htmlspecialchars($egySor['emeletek_szama']));
		echo sprintf("<td>". "<input type=text name=telek_id readonly value='%s'></td>",htmlspecialchars($egySor['telek_id']));
		echo sprintf("<td>". "<input type=hidden name=selected value='%s'></td>",htmlspecialchars($egySor['epuletszam']));
        echo "<td>". '<input type=submit name=edit value=Módosít />' ."</td>";
        echo "<td>". '<input type=submit name=delete value=Töröl />' ."</td>";
		echo '</form>';
        echo '</tr>';
    } 
    mysqli_free_result($epuletek);
?>
</table>