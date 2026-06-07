<?php
include 'db.php';
session_start();

$poruka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $korisnicko_ime = trim($_POST["korisnicko_ime"]);
    $lozinka = trim($_POST["lozinka"]);

    // Provjera postoji li korisnik u bazi
    $stmt = $conn->prepare("SELECT * FROM users WHERE korisnicko_ime = ?");
    $stmt->execute([$korisnicko_ime]);
    $korisnik = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($korisnik && password_verify($lozinka, $korisnik["lozinka"])) {
        // Postavljanje session varijabli
        $_SESSION["korisnicko_ime"] = $korisnik["korisnicko_ime"];
        $_SESSION["razina_dozvole"] = $korisnik["razina_dozvole"];

        // Provjera razine dozvole
        if ($korisnik["razina_dozvole"] == 1) {
            $poruka = "Dobro došli. Vaša razina je administrator. <a href='next.php'>NEXT</a>";
        } else {
            $poruka = "Dobro došli. <a href='next.php'>NEXT</a>";
        }
    } else {
        $poruka = "Pogrešno korisničko ime ili lozinka";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
</head>
<body>
    <h2>Prijava</h2>

    <?php if ($poruka != ""): ?>
        <p><?= $poruka ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Korisničko ime:</label><br>
        <input type="text" name="korisnicko_ime" required><br><br>

        <label>Lozinka:</label><br>
        <input type="password" name="lozinka" required><br><br>

        <button type="submit">Prijavi se</button>
    </form>
</body>
</html>