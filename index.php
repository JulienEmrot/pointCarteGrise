<?php
require_once "database/database.php";
require_once "database/functions/horraires.php";
require_once "database/functions/piafDemarche.php";
require_once "database/functions/articles.php";
$getLibelleIdDemarche = $database->select("demarches",[
    "id",
    "libelle"
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
    <link rel="stylesheet" href="css/onepage-scroll.css">
    <title>Point Carte Grise Rennes</title>
    <link href="https://fonts.googleapis.com/css?family=Asap:400,500,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d5c42957a3.js"></script>
</head>
<body>
<header>
    <div id="topBar">
        <div id="contentTopBar">
            <div id="contentLogo"><img src="images/logo.svg" alt="logo"></div>
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
<div class="main">
    <section class="contentPage">
        <div id="contentPage1" class="pages">
            <div id="partOnePageOne">
                <div id="carOne"><img src="images/car.svg" alt="voitureFemme"></div>
                <div id="contentRightOne">
                    <div id="contentHT">
                        <i class="far fa-clock iconHorLieu"></i>
                        <?php foreach ($getDays as $getDay) { ?>
                            <div class="horraires <?php if ($today == $nbrDay) {
                                echo 'actualDay';
                            } ?>">
                                <p><?php echo $getDay["jour"] ?></p>
                                <p><?php if ($getDay["of"] == 1) {
                                        echo "Fermé";
                                    } else {
                                        echo formatHeure($getDay["debut"]) ?>  -  <?php echo formatHeure($getDay["fin"]);
                                    }
                                    ?>
                                </p>
                            </div>
                            <?php $nbrDay++;
                        } ?>
                        <p id="iconLieu"><i class="fas fa-map-marker-alt iconHorLieu"></i></p>
                        <p>13 rue du Pré Botté</p>
                        <p>35000 Rennes</p>
                    </div>
                </div>
            </div>
            <div id="contentBtn1">
                <a id="btnRdv">PRENDRE UN RDV</a>
                <a href="#" id="btnRendre">LISTE DES PIÈCES À FOURNIR</a>
            </div>
        </div>

    </section>
    <section id="page2">
        <div id="page2left" class="centerFlexC">
            <h2 id="title2">liste des <span class="gras">pièces à fournir</span></h2>
            <form action="#" id="getList">
                <label for="nameDemarche" class="labelList">Type de démarche</label>
                <select name="nameDemarche" id="nameDemarche">
                    <?php foreach ($getListDemarches as $demarche) { ?>
                        <option value="<?php echo $demarche["id"] ?>"><?php echo $demarche["libelle"] ?></option>
                    <?php } ?>
                </select>
                <p class="labelList">Vous êtes
                </p>
                <div id="contentRadio">
                    <input type="radio" name="vous" value="1" id="choixOne">
                    <label for="choixOne">Un professionel</label>
                    <input type="radio" name="vous" value="2" id="choixTwo">
                    <label for="choixTwo">Un particulier</label>
                </div>
            </form>
            <div id="contentResultList">
            </div>
        </div>
        <div id="page2right" class="centerFlexC">
            <div id="imgPiaf"><img src="images/iconPIAF.svg" alt="piafIcon"></div>
        </div>
    </section>
    <section id="page3">
        <div id="hommeArticle"><img src="images/hommeArticle.svg" alt="Homme qui lit un article"></div>
        <div id="rectangleArticle"><img src="images/rectangleArticle.svg" alt="Rectangle Article"></div>
        <div id="contentPage3">
            <?php foreach ($getAllArticles as $getArticle) {?>
            <div class="article">
                <div class="contentImgArticle">
                    <img src="images/<?php echo $getArticle["image"]?>" alt="<?php echo $getArticle["image"]?>">
                </div>
                <div class="contentTextMore">
                    <div class="contentTitleText">
                        <h2 class="titleArticle"><?php echo $getArticle["title"]?></h2>
                        <p class="textArticle"><?php echo $getArticle["miniText"]?>
                        </p>
                    </div>
                    <div class="contentDateMore">
                        <div class="contentDate">
                            <div class="joursMois"><p class="jour"><?php echo $getArticle["jour"]?></p>
                                <p class="mois"><?php echo $getArticle["mois"]?></p></div>
                            <p class="Annee"><?php echo $getArticle["annee"]?></p>
                        </div>
                        <a href="#" class="showMore">EN SAVOIR PLUS</a>
                    </div>

                </div>
            </div>
            <?php }?>
        </div>
        <div id="contentMoreArticle">
            <a href="#">voir PLUS d’actualités</a>
        </div>

    </section>
</div>
<script src="js/sectionHeader.js"></script>
<script src="jquery.onepage-scroll.js"></script>
<script src="js/requete.js"></script>
<script>
    $(".main").onepage_scroll({
        sectionContainer: "section",     // sectionContainer accepts any kind of selector in case you don't want to use section
        easing: "ease",                  // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in",
                                         // "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
        animationTime: 1000,             // AnimationTime let you define how long each section takes to animate
        pagination: true,                // You can either show or hide the pagination. Toggle true for show, false for hide.
        updateURL: false,                // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
        beforeMove: function (index) {
        },  // This option accepts a callback function. The function will be called before the page moves.
        afterMove: function (index) {
        },   // This option accepts a callback function. The function will be called after the page moves.
        loop: true,                     // You can have the page loop back to the top/bottom when the user navigates at up/down on the first/last page.
        keyboard: true,                  // You can activate the keyboard controls
        responsiveFallback: false,        // You can fallback to normal page scroll by defining the width of the browser in which
        // you want the responsive fallback to be triggered. For example, set this to 600 and whenever
        // the browser's width is less than 600, the fallback will kick in.
        direction: "vertical"            // You can now define the direction of the One Page Scroll animation. Options available are "vertical" and "horizontal". The default value is "vertical".
    });

    function verifPiaf() {
        if (quiEst1.checked == true || quiEst2.checked == true && typeDemarche.value != "") {
            getPiafs(choixQui);
            console.log(choixQui);
        }};


    typeDemarche.addEventListener("change", function () {
        verifPiaf();
    });
    quiEst1.addEventListener("click", function () {
        choixQui = 2;
        verifPiaf();
    });
    quiEst2.addEventListener("click", function () {
        choixQui = 1;
        verifPiaf();
    });

</script>
</body>
</html>