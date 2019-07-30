<?php
require_once "../database/database.php";
require_once "../database/functions/horraires.php";
$allPiafs = $database->select("piaf","*");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reboot.css">
    <link rel="stylesheet" href="css/styleAdmin.css">
    <title>Point Carte Grise Rennes Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Asap:400,500,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d5c42957a3.js"></script>
</head>
<body>
<header>
    <div id="mainNav">
        <div class="containIconMenu">
            <a href="index.php"><i class="fas fa-home"></i></a>
        </div>
        <div class="containIconMenu">
            <a href="changeHorraire.php"><i class="fas fa-clock"></i></a>
        </div>
        <div class="containIconMenu">
            <a href="changePiafs.php"><i class="fas fa-id-card"></i></a>
        </div>

    </div>
</header>
<main>
    <h2 id="titlePage">Changer les PIAFS</h2>
    <section id="seeAllPiafs">
        <?php foreach ($allPiafs as $piaf) { ?>
            <div class="onePiaf">
        <p class="pPiaf"><?php echo $piaf["libelle"] ?></p>
                <button class="modifyAd"><i class="fas fa-pen"></i>Modifier</button>
                <button class="delete"><i class="fas fa-trash-alt"></i>Supprimer</button>
            </div>
        <?php }; ?>
    </section>
</main>