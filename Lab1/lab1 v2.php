<?php

$ocjena_predmet1 = 3;
$ocjena_predmet2 = 4;
$ocjena_predmet3 = 5;
$ocjena_predmet4 = 2;

$prosjek = ($ocjena_predmet1 + $ocjena_predmet2 + $ocjena_predmet3 + $ocjena_predmet4) / 4;

if ($prosjek < 1.5) {
    echo "Vaš prosjek je $prosjek (nedovoljan)";
} else if ($prosjek < 2.5) {
    echo "Vaš prosjek je $prosjek (dovoljan)";
} else if ($prosjek < 3.5) {
    echo "Vaš prosjek je $prosjek (dobar)";
} else if ($prosjek < 4.5) {
    echo "Vaš prosjek je $prosjek (vrlo dobar)";
} else {
    echo "Vaš prosjek je $prosjek (odličan)";
}

?>
