<?php
include_once 'menu.php';
include_once 'lekerdezesek.php';

echo menu();

$conn = connect();

if(ISSET($_POST["submit"])) {
	if(ISSET($_POST["telek_id"]) && ISSET($_POST["m2"]) && ISSET($_POST["utca"]) && ISSET($_POST["hazszam"]) 
		&& ISSET($_POST["iranyitoszam"])){
		$telek_id = $_POST["telek_id"];
		$m2 = $_POST["m2"];
		$utca = $_POST["utca"];
		$hazszam = $_POST["hazszam"];
		$iranyitoszam = $_POST["iranyitoszam"];
		
		insertTelek($telek_id, $m2, $utca, $hazszam, $iranyitoszam);

	} else {
		error_log("Valamelyik mező nincs kitöltve!");
	}
}

?>
<form method="POST">
Telek ID:
<input type="text" name="telek_id"/>
<br/>
m2:
<input type="text" name="m2"/>
<br/>
Utca:
<input type="text" name="utca"/>
<br/>
Házszám:
<input type="text" name="hazszam"/>
	<br/>
		Irányítószám:
		<select name="iranyitoszam">
			<option disabled selected value> -- select an option -- </option>
				
				<?php
				$sql = "SELECT iranyitoszam FROM helyseg";
				$res = mysqli_query($conn, $sql) or die ('Hibás utasítás: '.mysqli_error($conn));
				 
				while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
					$iranyitoszam = $current_row["iranyitoszam"];
					echo '<option value='.$iranyitoszam.'>'.$iranyitoszam.'</option>';
				}
				?>				
		</select>
<br/>
<input type="submit" name="submit" value="Létrehoz"/>
</form>

<h1>Telkek listája</h1>

<table border="1">
<tr>
<th>Telek ID</th>
<th>m2</th>
<th>Utca</th>
<th>Házszám</th>
<th>Irányítószám</th>
</tr>

<?php

    $telkek = getTelekList();

    while( $egySor = mysqli_fetch_assoc($telkek) ) { 
        echo '<tr>';
        echo '<form action=telekquery.php method=POST>';
		echo sprintf("<td>". "<input type=text name=telek_id readonly value='%s'></td>",htmlspecialchars($egySor['telek_id']));
		echo sprintf("<td>". "<input type=text name=m2 value='%s'></td>",htmlspecialchars($egySor['m2']));
		echo sprintf("<td>". "<input type=text name=utca value='%s'></td>",htmlspecialchars($egySor['utca']));
		echo sprintf("<td>". "<input type=text name=hazszam value='%s'></td>",htmlspecialchars($egySor['hazszam']));
		echo sprintf("<td>". "<input type=text name=iranyitoszam readonly value='%s'></td>",htmlspecialchars($egySor['iranyitoszam']));
		echo sprintf("<td>". "<input type=hidden name=selected value='%s'></td>",htmlspecialchars($egySor['telek_id']));
        echo "<td>". '<input type=submit name=edit value=Módosít />' ."</td>";
        echo "<td>". '<input type=submit name=delete value=Töröl />' ."</td>";
		echo '</form>';
        echo '</tr>';
    } 
    mysqli_free_result($telkek);
?>
</table>