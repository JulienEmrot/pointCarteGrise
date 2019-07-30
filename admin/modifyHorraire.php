<?php
require_once "../database/database.php";
require_once "../database/functions/horraires.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$jour = $_POST["jour"];
$type = $_POST["type"];

$theDay = $database->select("horraires","*", [
    "id[=]" => $jour
]);


?>


<?php if ($type == 1) {?>

<div class="champsWin">
            <p>Heure d'ouverture</p>
            <input type="time" id="ouvert" value="<?php echo formatHeurePoint($theDay[0]["debut"])?>">
        </div>
<div class="champsWin">
    <p>Heure de fermeture</p>
    <input type="time" id="fermer" value="<?php echo formatHeurePoint($theDay[0]["fin"])?>">
</div>
        <div class="actionCloseOrSend">
            <button class="close">Retour</button>
            <button class="modify" onclick="modifyTheDay(<?php echo $jour ?>)">Valider</button>
        </div>

<?php } else { ?>
    <?php
    $champsOuvert = $_POST["ouverture"];
    $champsFermer = $_POST["fermer"];

    $database->update("horraires", [
        "debut" => $champsOuvert,
        "fin" => $champsFermer
],[
        "id[=]" => $jour
    ]);
    $getDays = $database->select("horraires","*");
    ?>
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

<?php } ?>
