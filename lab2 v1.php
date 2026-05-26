<?php
$boja ='#000000';
if(isset($_POST['posalji'])){
    if(isset($_POST['promjena']) && isset($_POST['odabranaboja'])){
        $boja = $_POST['odabranaboja'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labos 2 v1</title>
    <style>
        body{
            font-family: sans-serif;
            padding : 15px;
            color : <?php echo htmlspecialchars($boja);?>
        }
        form {
            border: 1px solid blue;
            padding: 15px;
            width: 300px;
        }
        .ss
        {
            margin-bottom:10px; padding-bottom:10px; border-bottom: 1px solid green;
        }
        input[type="submit"]{
            background:  yellow; color: black; border: none;
            padding: 10px 20px; cursor: pointer;
        }
    </style>
</head>
<body>
    <h2> Promjena boje teksta</h2>
    <p> Ovaj tekst ce promjeniti boju ako oznacite checkbox i posaljete formu</p>
    <form method="POST" action="">
        <div class="ss">
            <label for="odabranaboja"> odaberite boju: </label><br>
            <input type="color" name="odabaranaboja" id="odabranaboja" value ="#000000">
        </div>
            <div class="ss">
                <p> Zelite li promjeniti boju:</p>
                <input type="checkbox" name="promjena" id="promjena" value="da">
                <label for="promjena">Zelim</label>
        </div>
        <input type="submit" name="posalji" value="Promjeni boju">
    </form>
    <?php
        if(isset($_POST['posalji'])){
            if(isset($_POST['promjena'])){
                echo "<p>Boja promjenja u: . htmlspecialchars($boja) . </p>";{
                else{ 
                    echo "<p> Checkbox nije oznacen - boja nije promjenjena </p>";
                    }
            }
        }
    ?>
</body>
</html>