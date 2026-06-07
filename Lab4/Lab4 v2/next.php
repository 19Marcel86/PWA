<?php
session_start();

// Provjera je li korisnik prijavljen
if (!isset($_SESSION["korisnicko_ime"])) {
    echo "Niste prijavljeni. <a href='login.php'>Povratak na prijavu</a>";
    exit();
}

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$razina = $_SESSION["razina_dozvole"];

if ($razina == 1) {
    echo "Dobro došli " . $korisnicko_ime . ". Vaša razina je administrator.";
} else {
    echo "Dobro došli " . $korisnicko_ime . ".";
}
?>