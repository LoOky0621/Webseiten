<?php

define("MEILE", 0.621371);

function kilometerInMeilen($weg) {
    $inMeilen = $weg * MEILE;
    $gerundetInMeilen = number_format($inMeilen, 2);
    return $gerundetInMeilen;
}

$meilen = kilometerInMeilen($kilometer);

echo "Die beliebteste Route ist $kilometer km ($meilen mi) lang.";