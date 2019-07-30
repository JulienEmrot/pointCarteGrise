<?php
require_once "../database/database.php";
require_once "../database/functions/horraires.php";
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
    <h2 id="titlePage">Changer les horaires</h2>

    <section id="contentAllHoraires">
        <?php foreach ($getDays as $getDay) { ?>
            <div class="contentDay <?php if ($today == $nbrDay) {
                echo 'actualDay';
            } ?>">
                <p class="dayAd"><?php echo $getDay["jour"] ?></p>
                <p class="horraireAd"><?php if ($getDay["of"] == 1) {
                        echo "Fermé";
                    } else {
                        echo formatHeure($getDay["debut"]) ?>  -  <?php echo formatHeure($getDay["fin"]);
                    }
                    ?>
                </p>
                <btn class="modifyAd" onclick="getTheDay(<?php echo $getDay["id"]?>)"><i class="fas fa-pen"></i>Modifier</btn>
                <?php if ($getDay["of"] == 1) { ?>
                <a class="isCloseAd" href="closeOrOpenDay.php?id=<?php echo $getDay["id"]?>&open=<?php echo $getDay["of"]?>">
                Ouvrir ce jour</a>

                    <?php } else { ?>
                <a class="isOpenAd" href="closeOrOpenDay.php?id=<?php echo $getDay["id"]?>&open=<?php echo $getDay["of"]?>">
                    Fermer ce jour</a>
                    <?php };
                    ?>
            </div>
            <?php $nbrDay++;
        } ?>
    </section>
    <div id="contentWinDay">

    </div>
</main>
<script src="requeteAdmin.js"></script>
<script>

</script>
</body>
</html>