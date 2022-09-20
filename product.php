<?php
$productId = $_GET["id"];
require("vendor/autoload.php");
$title = "Produit";
include("inc/config.php");
include("inc/header.php");


$sql = "SELECT * FROM `produits` WHERE `id` = ?";
$sth = $log->prepare($sql);
$sth->execute(array($productId));
$produit = $sth->fetch(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM `categories` WHERE `id` = ?";
$sth2 = $log->prepare($sql2);
$sth2->execute(array($produit["categories_id"]));
$subCategorie = $sth2->fetch(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM `categories` WHERE `id` = ?";
$sth3 = $log->prepare($sql3);
$sth3->execute(array($subCategorie["categorie_id"]));
$categorie = $sth3->fetch(PDO::FETCH_ASSOC);

$sql4 = "SELECT * FROM `produits` WHERE `categories_id` = ?";
$sth4 = $log->prepare($sql4);
$sth4->execute(array($produit["categories_id"]));
$Allproduit = $sth4->fetchAll(PDO::FETCH_ASSOC);

include("inc/function.php");
?>

<div id="ariane">
    <div class="container">
        <div class="row">
            <p>Accueil / <?= $categorie["name"] ?> / <?= $subCategorie["name"] ?> / <?= $produit["name"] ?></p>
        </div>
    </div>
</div>

<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="title-dash"><?= $produit["name"] ?></h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <?php
                        echo '<img class="w-100" src="assets/php/productImage.php?file=' . $produit["image"] . '" alt="' . $produit["name"] . '">';
                    ?>
                </div>
                <div class="col-lg-6 col-md-12">
                    <?php
                        echo '<p>' . $produit["description"] . '</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="products">
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <h1 class="title-dash">Dans la même catégorie</h1>
            </div>
                        <?php
                            foreach ($Allproduit as $produit) {
                               echo productImage($produit);
                            }
                        ?>
        </div>
    </div>
</section>

<?php
include("inc/footer.php");