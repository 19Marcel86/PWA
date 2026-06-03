<?php

$h   = "localhost";
$u   = "root";
$p   = "admin";
$db  = "korisnici_db";

$con = mysqli_connect($h, $u, $p, $db);

if (!$con) {
    die("Konekcija nije uspjela: " . mysqli_connect_error());
}

$sql = "SELECT id, ime, prezime, spol, telefon, email, godine, hobi FROM korisnik";
$res = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prikaz korisnika</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 12px; }
        th { background-color: #ffffff; }
        .muski  { background-color: blue; color: white; }
        .zenski { background-color: red;  color: white; }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>id</th><th>ime</th><th>prezime</th><th>spol</th>
            <th>telefon</th><th>email</th><th>godine</th><th>hobi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($res)): ?>
            <?php $cls = $row["spol"] === "M" ? "muski" : "zenski"; ?>
            <tr class="<?= $cls ?>">
                <td><?= htmlspecialchars($row["id"])      ?></td>
                <td><?= htmlspecialchars($row["ime"])     ?></td>
                <td><?= htmlspecialchars($row["prezime"]) ?></td>
                <td><?= htmlspecialchars($row["spol"])    ?></td>
                <td><?= htmlspecialchars($row["telefon"]) ?></td>
                <td><?= htmlspecialchars($row["email"])   ?></td>
                <td><?= htmlspecialchars($row["godine"])  ?></td>
                <td><?= htmlspecialchars($row["hobi"])    ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

<?php mysqli_close($con); ?>