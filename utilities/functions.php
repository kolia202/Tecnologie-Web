<?php

function getFormattedPrice($price) {
    return number_format($price, 2, ',', '.') . '€';
}

function isUserLoggedIn() {
    return isset($_SESSION['utente']);
}

function getFormattedDate($data) {
    return DateTime::createFromFormat('Y-m-d', $data)->format('d-m-Y');
}

function getStarRating($rating) {
    $fullStars = floor($rating); 
    $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0; 
    $emptyStars = 5 - ($fullStars + $halfStar); 
    $stars = str_repeat('<i class="bi bi-star-fill text-warning"></i> ', $fullStars);
    if ($halfStar) {
        $stars .= '<i class="bi bi-star-half text-warning"></i> ';
    }
    $stars .= str_repeat('<i class="bi bi-star text-warning"></i> ', $emptyStars);
    return $stars;
}

function getRecensioniDistribuzione($voti) {
    $totalRecensioni = count($voti);
    $positive = 0; 
    $neutral = 0; 
    $negative = 0; 
    foreach ($voti as $voto) {
        $valore = $voto['Voto']; 
        if ($valore >= 4) {
            $positive++;
        } elseif ($valore >= 2) {
            $neutral++;
        } else {
            $negative++;
        }
    }
    $positivePerc = $totalRecensioni > 0 ? ($positive / $totalRecensioni) * 100 : 0;
    $neutralPerc = $totalRecensioni > 0 ? ($neutral / $totalRecensioni) * 100 : 0;
    $negativePerc = $totalRecensioni > 0 ? ($negative / $totalRecensioni) * 100 : 0;
    return [
        "positive" => ["count" => $positive, "percent" => number_format($positivePerc, 1)],
        "neutral"  => ["count" => $neutral, "percent" => number_format($neutralPerc, 1)],
        "negative" => ["count" => $negative, "percent" => number_format($negativePerc, 1)],
        "total"    => $totalRecensioni
    ];
}

function isAdminLoggedIn() {
    return isset($_SESSION['utente']) && isset($_SESSION['admin']) && $_SESSION['admin'];
}


?>