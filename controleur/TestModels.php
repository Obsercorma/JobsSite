<?php

require_once("modele/mod_etudiants.php");

echo "<pre>".print_r(getRequestedOffersFromStudent(1),true)."</pre>";

?>