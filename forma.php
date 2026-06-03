php<?php
$h  = "localhost";
$u  = "root";
$p  = "admin";
$db = "studenti_db";

$msg     = "";
$msgCls  = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $con = mysqli_connect($h, $u, $p, $db);

    if (!$con) {
        $msg    = "Konekcija na bazu nije uspjela: " . mysqli_connect_error();
        $msgCls = "greska";
    } else {
        $ime  = trim(mysqli_real_escape_string($con, $_POST["ime"]));
        $prz  = trim(mysqli_real_escape_string($con, $_POST["prezime"]));
        $jmb  = trim(mysqli_real_escape_string($con, $_POST["jmbag"]));
        $mail = trim(mysqli_real_escape_string($con, $_POST["mail"]));

        if (empty($ime) || empty($prz) || empty($jmb) || empty($mail)) {
            $msg    = "Sva polja su obavezna.";
            $msgCls = "upozorenje";
        } elseif (!is_numeric($jmb) || strlen($jmb) > 10) {
            $msg    = "JMBAG mora biti broj s najviše 10 znamenki.";
            $msgCls = "upozorenje";
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $msg    = "E-mail adresa nije u ispravnom formatu.";
            $msgCls = "upozorenje";
        } else {
            $sql = "INSERT INTO Student (ime_studenta, prezime_studenta, JMBAG, e_mail)
                    VALUES ('$ime', '$prz', '$jmb', '$mail')";
            if (mysqli_query($con, $sql)) {
                $msg    = "Podaci su uspješno spremljeni u bazu!";
                $msgCls = "uspjeh";
            } else {
                $msg    = "Greška pri unosu: " . mysqli_error($con);
                $msgCls = "greska";
            }
        }
        mysqli_close($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
</head>
<body>
    <?php if (!empty($msg)): ?>
        <p class="<?= $msgCls ?>"><?= $msg ?></p>
    <?php endif; ?>
    <form method="POST" action="student_forma.php">
        <label for="ime">Ime</label><br />
        <input name="ime" type="text" required
               value="<?= isset($_POST['ime'])     ? htmlspecialchars($_POST['ime'])     : '' ?>"/><br />
        <label for="prezime">Prezime</label><br />
        <input name="prezime" type="text" required
               value="<?= isset($_POST['prezime']) ? htmlspecialchars($_POST['prezime']) : '' ?>"/><br />
        <label for="jmbag">JMBAG</label><br />
        <input name="jmbag" type="number" required
               value="<?= isset($_POST['jmbag'])   ? htmlspecialchars($_POST['jmbag'])   : '' ?>"/><br />
        <label for="mail">E-mail</label><br />
        <input name="mail" type="email" required
               value="<?= isset($_POST['mail'])    ? htmlspecialchars($_POST['mail'])    : '' ?>"/><br />
        <input name="submit" type="submit" value="Pošalji" />
    </form>
</body>
</html>