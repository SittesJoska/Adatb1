<?php

echo '<h1>Ingatlanok adatbázis</h1>';

function menu() {
	
    $menustr  = '<table>';
    $menustr .= '<tr>';
    $menustr .= '<td>';
    $menustr .= '<a href="helysegek.php">Helységek</a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '<a href="telkek.php">Telkek</a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '<a href="epuletek.php">Épületek</a>';
    $menustr .= '</td>';
	$menustr .= '<td>';
    $menustr .= '<a href="lakasok.php">Lakások</a>';
    $menustr .= '</td>';
	$menustr .= '<td>';
    $menustr .= '<a href="szemelyek.php">Személyek</a>';
    $menustr .= '</td>';
	$menustr .= '<td>';
    $menustr .= '<a href="berlesek.php">Bérlések</a>';
    $menustr .= '</td>';
	$menustr .= '<td>';
    $menustr .= '<a href="queries.php">Összesített adatok</a>';
    $menustr .= '</td>';
    $menustr .= '</tr>';
    $menustr .= '</table>';
	    
    return $menustr;

}

?>