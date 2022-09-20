<?php
require("vendor/autoload.php");
$title = "Acceuil";
include("inc/config.php");
include("inc/header.php");
    $sql = "SELECT * FROM `produits` LIMIT 0,8";
    $sth = $log->prepare($sql);
    $sth->execute();
    $produits = $sth->fetchAll(PDO::FETCH_ASSOC);

include("inc/function.php");
?>
<div class="container-fluid carousel-container">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/php/slider.php?file=chrysantheme-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/php/slider.php?file=citrouille.2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/php/slider.php?file=firethorn.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<section id="products">
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-3">
                <h1 class="title-dash">Nos meilleures ventes</h1>
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