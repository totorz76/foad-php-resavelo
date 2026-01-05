<?php
// Fonction de calcul

function calculatePrice($price_per_day, $start_date, $end_date)
{
    $total_price = ($end_date - $start_date) * $price_per_day;
    return $total_price;
};