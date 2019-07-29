<?php
require_once "../database.php";
$content = "";
$idDemarche = $_POST["demarches"];
$quiEst = $_POST["quiEst"];

$etapeOnePiafs = $database->select("demarches_as_piaf","*",[
    "id_demarches[=]" => $idDemarche
]);

foreach ($etapeOnePiafs as $etapeOnePiaf) {
    $etapeTwoPiafs = $database->select("piaf","*",[
        "id" => $etapeOnePiaf["id_piaf"],
        "statuts" => [0,$quiEst]
    ]);
    foreach ($etapeTwoPiafs as $etapeTwoPiaf) {
        $content .= '<p class="piafStyleDem">' . $etapeTwoPiaf["libelle"] . '</p>';
    }
};

echo $content;