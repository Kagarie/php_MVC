<?php
function nombreElementPanier(): int
{
    $nbr = 0;
    foreach ($_SESSION['panier'] as $cle => $valeur) {
        foreach ($valeur as $key => $value) {
            if (strcmp($key, 'nbr') == 0)
                $nbr += $value;
        }
    }
    return $nbr;
}

function prixTotal(): float
{
    $total = 0;
    $nbr = 0;
    foreach ($_SESSION['panier'] as $cle => $valeur) {
        foreach ($valeur as $key => $value) {
            if (strcmp($key, 'nbr') == 0)
                $nbr = $value;
            if (strcmp($key, 'prix') == 0)
                $total += $value * $nbr;
        }
    }
    return $total;
}

?>