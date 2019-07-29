<?php
date_default_timezone_set('Europe/Paris');
$today = date("N");
$heureToday = date("H\hi");
$getDays = $database->select("horraires","*");
$nbrDay = 1;
$verifDay = 1;
function formatHeure($heure) {
    $newHorraire = date("H\hi", strtotime($heure));
    echo $newHorraire;
}

foreach ($getDays as $getDayOf) {
    if ($getDayOf["of"] == 0 && $getDayOf["debut"] <= $heureToday && $getDayOf["fin"] >= $heureToday && $today == $verifDay) {
        $isOpen = "oui";
        break;
    } else {
        $isOpen = "non";
        $verifDay++;
    } }
;