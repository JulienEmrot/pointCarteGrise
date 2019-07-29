<?php
require_once "database/database.php";
require_once "database/functions/horraires.php";
require_once "database/functions/piafDemarche.php";
$valueDemarche = $_GET["id"];
$getLibelleIdDemarche = $database->select("demarches",[
    "id",
    "libelle"
]);

$getAllInfoDemarche = $database->select("demarches","*",[
	"id" => $valueDemarche
]);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reboot.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Point Carte Grise Rennes</title>
    <link href="https://fonts.googleapis.com/css?family=Asap:400,500,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d5c42957a3.js"></script>
</head>
<body>
    <header>
        <div id="topBar">
            <div id="contentTopBar">
                <a href="index.php" id="contentLogo"><img src="images/logo.svg" alt="logo"></a>
                <div id="contentDOT">
                    <div id="demarches">
                        <button class="btnBlue" id="getDemarches">Les démarches <i id="downArrow"
                                                                                   class="fas fa-chevron-up fa-rotate-180"></i>
                        </button>
                        <nav id="listDemarches">
                            <ul>
                                <?php foreach ($getLibelleIdDemarche as $getOneLibelleIdDemarche) { ?>
                                    <li><a href="demarches.php?id=<?php echo $getOneLibelleIdDemarche["id"] ?>"><?php echo $getOneLibelleIdDemarche["libelle"] ?></a></li>
                                <?php } ; ?>
                            </ul>
                        </nav>
                    </div>
                    <div id="isOpen">
                        <?php if ($isOpen == "oui") : ?>
                            <i class="fas fa-circle open"></i>
                            <p>Ouvert</p>
                        <?php else : ?>
                            <i class="fas fa-circle close"></i>
                            <p>Fermé</p>
                        <?php endif; ?>
                    </div>
                    <div id="numTel">
                        <i class="fas fa-phone-alt iconTel"></i>
                        <p> 02 30 96 07 07</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="mainDemarches">

        <div id="container4col">
            <h1 id="titleDemarche"><?php echo $getAllInfoDemarche[0]["title_demarche"]?></h1>
            <div id="col1" class="allCol">
                <div id="infoImportante"><?php echo $getAllInfoDemarche[0]["text_important"]?>
                </div>
                <div id="textOne">
                    <h2 id="titleTextOne"><?php echo $getAllInfoDemarche[0]["title_colOne"]?></h2>
                    <p> <?php echo $getAllInfoDemarche[0]["text_colOne"]?> </p>
                </div>
            </div>
            <div id="colImage"><img src="images/<?php echo $getAllInfoDemarche[0]["img_demarche"]?>" alt=""></div>
            <div id="col2" class="allCol">
                <?php echo $getAllInfoDemarche[0]["text_colTwo"]?>
               </div>
            <div id="col3" class="allCol">
                <h2 id="piafTitle">liste des <span class="gras">pièces à fournir</span></h2>
                <div id="contentRadioDemarche">
                    <p class="labelList">Vous êtes
                    </p>
                    <div>
                    <input type="radio" name="vous" value="1" id="choixOne">
                    <label for="choixOne">Un professionel</label>
                    </div>
                    <div>
                    <input type="radio" name="vous" value="2" id="choixTwo">
                    <label for="choixTwo">Un particulier</label>
                    </div>
                    <input type="text" id="demarcheValue" hidden value="<?php echo $valueDemarche; ?>">
                </div>
                <div id="contentResultList">
                </div>
            </div>
        </div>
    </main>
    <script src="js/sectionHeader.js"></script>
    <script src="js/requete.js"></script>
    <script>
        function verifPiafDem() {
            if (quiEst1.checked === true || quiEst2.checked === true) {
                getPiafsDem(choixQui);
                console.log(choixQui);
            }};


        quiEst1.addEventListener("click", function () {
            choixQui = 2;
            verifPiafDem();
        });
        quiEst2.addEventListener("click", function () {
            choixQui = 1;
            verifPiafDem();
        });
    </script>
</body>
</html>

