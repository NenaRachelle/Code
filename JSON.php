<?php

$zomaarobject = new \stdClass();
$zomaarobject->voornaam = $devoornaam;
$zomaarobject->achternaam = $_GET['achternaam'];
$zomaarobject->klas = $_GET['klas'];

$myJSON = json_encode($zomaarobject);
echo $myJSON;
