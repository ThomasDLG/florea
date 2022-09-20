<?php

function productImage($produit) {
    $s ='';
    $s .= '<div class="product-item col-lg-3 col-md-6 col-sm-12">';
        $s .= '<h4>' . $produit["name"] . '</h4>';
        $s .= '<a href="product.php?id='. $produit["id"] . '">';
        $s .= '<div class="product-image">';
                $s .= '<img class="w-100" src="assets/php/thumb.php?file=' . $produit["image"] . '" alt="' . $produit["name"] . '">';
            $s .= '<span class="product-prix">' . number_format($produit["prix"], 2, ',', ' ') . '€</span>';
        $s .= '</div>';
        $s .= '</a>';
    $s .= '</div>';
    return $s;
}