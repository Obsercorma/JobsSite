<?php

require_once("modele/mod_annonces.php");

echo "<pre>".print_r(addOffer(
    "Offre test",
    '1',
    "Lieu de test",
    '1',
    "2023-11-23",
    "2023-11-25",
    '2',
    "Description de test",
),true)."</pre>";

?>