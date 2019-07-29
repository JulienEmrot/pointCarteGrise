<?php
require_once "../database/database.php";
$getIdDay = $_GET["id"];
$open = $_GET["open"];

if ($open == 0) {

    $database->update("horraires", [
        "of" => 1,
    ], [
        "id" => $getIdDay
    ]);

    header('Location: http://emrotjulien.fr/newPoint/admin/changeHorraire.php');
} elseif ($open == 1) {
    $database->update("horraires", [
        "of" => 0,
    ], [
        "id" => $getIdDay
    ]);

    header('Location: http://emrotjulien.fr/newPoint/admin/changeHorraire.php');
}