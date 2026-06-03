<?php
    function mkTbl($r, $c) {
        echo "<table border='1' cellpadding='15' cellspacing='0'>";
        for ($i = 0; $i < $r; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $c; $j++) {
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Vjezba - HTML tablica</title>
    <style>
        body {font-family: sans-serif; padding: 30px; }
        form { background: #fff; color: #000; padding: 20px; width: 350px; border-radius: 5px; }
        .red { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #6b2c5f; }
        input[type="number"] { width: 100%; padding: 8px; font-size: 14px; }
        input[type="submit"] {
            background: #333; color: white; border: none;
            padding: 10px 20px; cursor: pointer; font-weight: bold;
        }
        table { background: #fff; color: #000; margin-top: 15px; }
    </style>
</head>
<body>

    <h2>Funkcija za ispis HTML tablice</h2>

    <form method="POST" action="">
        <div class="red">
            <label for="r">Upisite broj redaka</label><br>
            <input type="number" name="r" id="r" min="1" max="50" required>
        </div>
        <div class="red">
            <label for="c">Upisite broj kolona</label><br>
            <input type="number" name="c" id="c" min="1" max="50" required>
        </div>
        <input type="submit" name="sub" value="NAPRAVI TABLICU">
    </form>

    <?php
        if (isset($_POST['sub']) && isset($_POST['r']) && isset($_POST['c'])) {
            $r = (int)$_POST['r'];
            $c = (int)$_POST['c'];

            if ($r > 0 && $c > 0) {
                echo "<p>Ispis tablice:</p>";
                mkTbl($r, $c);
            } else {
                echo "<p>Unesite pozitivne brojeve!</p>";
            }
        }
    ?>

</body>
</html>