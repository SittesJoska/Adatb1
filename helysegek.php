<?php
include_once 'menu.php';
include_once 'lekerdezesek.php';

echo menu();

$conn = connect();

if(ISSET($_POST["create"])) {
	if(ISSET($_POST["iranyitoszam"]) && ISSET($_POST["helyseg_nev"])){
		$iranyitoszam = $_POST["iranyitoszam"];
		$helyseg_nev = $_POST["helyseg_nev"];
		
		insertHelyseg($iranyitoszam, $helyseg_nev);
		
	} else {
		error_log("Valamelyik mező nincs kitöltve!");
	}
}

?>
<form method="POST">
Irányítószám:
<input type="text" name="iranyitoszam"/>
<br/>
Helység neve:
<input type="text" name="helyseg_nev"/>
<br/>
<input type="submit" name="create" value="Létrehoz"/>
</form>

<h1>Helységek listája</h1>

<table border="1">
<tr>
<th>Irányítószám</th>
<th>Helység</th>

</tr>

<?php

    $helysegek = getHelysegList();
	
    while( $egySor = mysqli_fetch_assoc($helysegek) ) { 
        echo '<tr>';
		echo '<form action=helysegquery.php method=POST>';
		echo sprintf("<td>". "<input type=text name=iranyitoszam readonly value='%s'></td>",htmlspecialchars($egySor['iranyitoszam']));
		echo sprintf("<td>". "<input type=text name=helyseg_nev value='%s'></td>",htmlspecialchars($egySor['helyseg_nev']));
		echo sprintf("<td>". "<input type=hidden name=selected value='%s'></td>",htmlspecialchars($egySor['iranyitoszam']));
        echo "<td>". '<input type=submit name=edit value=Módosít />' ."</td>";
        echo "<td>". '<input type=submit name=delete value=Töröl />' ."</td>";
		echo '</form>';
        echo '</tr>';
    }
    mysqli_free_result($helysegek);
?>
</table>