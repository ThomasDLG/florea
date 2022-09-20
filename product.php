<?php

require("vendor/autoload.php");
$title = "Catégories";
include("inc/config.php");
include("inc/header.php");
$getSubCategorie = $_GET["subcategorie"];
$getCategorie = $_GET["categorie"];

$sql = "SELECT * FROM `produits` WHERE `categories_id` = ?";
$sth = $log->prepare($sql);
$sth->execute(array($getSubCategorie));
$produits = $sth->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM `categories` WHERE `id` = ?";
$sth2 = $log->prepare($sql2);
$sth2->execute(array($getSubCategorie));
$subCategorie = $sth2->fetch(PDO::FETCH_OBJ);

$sql3 = "SELECT `name` FROM `categories` WHERE `id` = ?";
$sth3 = $log->prepare($sql3);
$sth3->execute(array($getCategorie));
$categorie = $sth3->fetch(PDO::FETCH_OBJ);

include("inc/function.php");
?>
<div id="ariane">
    <div class="container">
        <div class="row">
            <p class="ariane">Accueil / <?= $categorie->name ?> / <?= $subCategorie->name ?> / </p>
        </div>
    </div>
</div>