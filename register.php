<?php
include 'db.php';

$poruka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $korisnicko_ime = trim($_POST["korisnicko_ime"]);
    $lozinka = trim($_POST["lozinka"]);

    // Provjera postoji li korisničko ime
    $stmt = $conn->prepare("SELECT id FROM users WHERE korisnicko_ime = ?");
    $stmt->execute([$korisnicko_ime]);

    if ($stmt->rowCount() > 0) {
        $poruka = "Korisničko ime se već koristi";
    } else {
        $hash = password_hash($lozinka, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO users (korisnicko_ime, lozinka, razina_dozvole) VALUES (?, ?, 1)");
        $insert->execute([$korisnicko_ime, $hash]);
        $poruka = "Registracija je uspješna";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body>
    <h2>Registracija</h2>

    <?php if ($poruka != ""): ?>
        <p><?= $poruka ?></p>
    <?php endif; ?>

    <form method="POST" action="register.php">
        <label>Korisničko ime:</label><br>
        <input type="text" name="korisnicko_ime" required><br><br>

        <label>Lozinka:</label><br>
        <input type="password" name="lozinka" required><br><br>

        <button type="submit">Registriraj se</button>
    </form>
</body>
</html>