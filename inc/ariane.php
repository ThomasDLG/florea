<?php
$getSubCategorie = $_GET["subcategorie"];
$getCategorie = $_GET["categorie"];
$sql2 = "SELECT * FROM `categories` WHERE `id` = ?";
$sth2 = $log->prepare($sql2);
$sth2->execute(array($getSubCategorie));
$subCategorie = $sth2->fetch(PDO::FETCH_OBJ);

$sql3 = "SELECT `name` FROM `categories` WHERE `id` = ?";
$sth3 = $log->prepare($sql3);
$sth3->execute(array($getCategorie));
$categorie = $sth3->fetch(PDO::FETCH_OBJ);

echo '<div id="ariane">';
    echo '<div class="container">';
        echo '<div class="row">';
            echo '<p>Accueil / ' . $categorie->name . ' / ' . $subCategorie->name . '';
            echo '</p>';
        echo '</div>';
    echo '</div>';
echo '</div>';
?>