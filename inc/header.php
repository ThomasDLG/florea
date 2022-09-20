<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/custom.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <div class="container d-flex flex-wrap">
                        <div class="col-12">
                            <a class="navbar-brand d-flex justify-content-center" href="index.php">
                                <img src="assets/img/logo.svg" alt="">
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                                </li>
                                <?php
                                    $sql = "SELECT * FROM `categories` WHERE `categorie_id` IS NULL";
                                    $sth = $log->prepare($sql);
                                    $sth->execute();
                                    $categories = $sth->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($categories as $categorie) {
                                            echo '<li class="nav-item dropdown">';
                                                echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">'
                                                 . $categorie["name"] .
                                                 '</a>';
                                                 $sql2 = "SELECT * FROM `categories` WHERE `categorie_id` = ? ";
                                                 $sth2 = $log->prepare($sql2);
                                                 $sth2->execute(array($categorie["id"]));
                                                 $subCategories = $sth2->fetchAll(PDO::FETCH_ASSOC);
                                                 echo '<ul class="dropdown-menu">';
                                                 foreach ($subCategories as $subCategorie) {
                                                        echo '<li><a class="dropdown-item" href="subcategorie.php?subcategorie=' . $subCategorie["id"] . '&categorie=' . $categorie["id"] . '">' . $subCategorie["name"] . '</a></li>';
                                                 }
                                                 echo '</ul>';
                                            echo '</li>';
                                        }
                                ?>
                                <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" href="#">Contact</a>
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recherche" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                    </nav>
                    </div>
                </div>
            </div>
    </header>


<?php
