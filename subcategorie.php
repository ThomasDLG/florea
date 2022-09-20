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
            <p class="ariane">Accueil / <?= $categorie->name ?> / <?= $subCategorie->name ?></p>
        </div>
    </div>
</div>

<section id="products">
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <h1 class="title-dash"><?= $subCategorie->name ?></h1>

                <p class="my-3"><?= $subCategorie->description ?></p>
            </div>
                        <?php
                            foreach ($produits as $produit) {
                               echo productImage($produit);
                            }
                        ?>
        </div>
    </div>
</section>
<?php
include("inc/footer.php");