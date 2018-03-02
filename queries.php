<?php
include_once 'menu.php';
include_once 'lekerdezesek.php';

echo menu();

$conn = connect();
?>
<h3>Bérleti díjak összege telkenként</h3>

<table border="1">
<tr>
<th>Bérleti díjak összege</th>
<th>Telek ID</th>
</tr>

<?php

    $results = query1();

    while( $egySor = mysqli_fetch_assoc($results) ) { 
        echo '<tr>';
		echo sprintf("<td>". "<input type=text name=berleti_sum readonly value='%s'></td>",htmlspecialchars($egySor['berleti_sum']));
		echo sprintf("<td>". "<input type=text name=telek_sum readonly value='%s'></td>",htmlspecialchars($egySor['telek_sum']));
        echo '</tr>';
    } 
    mysqli_free_result($results);
?>
</table>

<h3>Lakások száma utcánként</h3>

<table border="1">
<tr>
<th>Lakások száma</th>
<th>Utca</th>
</tr>

<?php

    $results = query2();

    while( $egySor = mysqli_fetch_assoc($results) ) { 
        echo '<tr>';
		echo sprintf("<td>". "<input type=text name=lakas_count readonly value='%s'></td>",htmlspecialchars($egySor['lakas_count']));
		echo sprintf("<td>". "<input type=text name=telek_utca readonly value='%s'></td>",htmlspecialchars($egySor['telek_utca']));
        echo '</tr>';
    } 
    mysqli_free_result($results);
?>
</table>

<h3>Átlagon felüli bérleti díjak</h3>

<table border="1">
<tr>
<th>Név</th>
<th>Bérleti díj</th>
</tr>

<?php

    $results = allekerdezes();

    while( $egySor = mysqli_fetch_assoc($results) ) { 
        echo '<tr>';
		echo sprintf("<td>". "<input type=text name=szemely_nev readonly value='%s'></td>",htmlspecialchars($egySor['szemely_nev']));
		echo sprintf("<td>". "<input type=text name=max_berleti readonly value='%s'></td>",htmlspecialchars($egySor['max_berleti']));
        echo '</tr>';
    } 
    mysqli_free_result($results);
?>
</table>