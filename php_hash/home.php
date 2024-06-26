<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ACCUEIL</h1>

    <?php if(isset($_SESSION)) {
        echo "<h2>Bienvenue ". $_SESSION["user"]["pseudo"]."</h2>";
    } ?>

</body>
</html>