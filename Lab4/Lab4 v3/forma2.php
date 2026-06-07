<?php
$poruka = "";

$dbc = mysqli_connect("localhost", "root", "", "zadatak3");

if (!$dbc) {
    die("Greška pri spajanju na bazu: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = trim($_POST["ime"]);
    $prezime = trim($_POST["prezime"]);
    $grad = trim($_POST["grad"]);
    $postanski_broj = trim($_POST["postanski_broj"]);

    $sql = "INSERT INTO osobe (ime, prezime, grad, postanski_broj) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)) {

        mysqli_stmt_bind_param($stmt, "sssi", $ime, $prezime, $grad, $postanski_broj);

        mysqli_stmt_execute($stmt);

        $poruka = "Podaci su uspješno upisani u bazu!";
    } else {
        $poruka = "Greška pri upisu podataka.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Unos podataka</title>
</head>
<body>
    <h2>Unos podataka</h2>

    <?php if ($poruka != ""): ?>
        <p><?= $poruka ?></p>
    <?php endif; ?>

    <form method="POST" action="forma.php">

        <label>Ime:</label><br>
        <input type="text" name="ime" required><br><br>

        <label>Prezime:</label><br>
        <input type="text" name="prezime" required><br><br>

        <label>Grad:</label><br>
        <input type="text" name="grad" required><br><br>

        <label>Poštanski broj:</label><br>
        <input type="number" name="postanski_broj" required><br><br>

        <button type="submit">Unesi podatke</button>

    </form>
</body>
</html>