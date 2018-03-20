<?php

$sn="localhost";
            $un="root";
            $pw="root";
            $db="boten";
            $conn = new mysqli($sn, $un, $pw, $db);
            $scheepsnaam = $_GET['scheepsnaam'];
            $sqli = "INSERT INTO boten(scheepsnaam, scheepslengte, vaarsnelheid, kleur) VALUES ('$scheepsnaam',".$_GET['scheepslengte'].",".$_GET['vaarsnelheid'].",'".$_GET['kleur']."');";
            $alleSchepen = "SELECT * FROM boten;";
            $id = $_GET['id'];
            $sql = "DELETE FROM `boten` WHERE `id` = $id";
            
            $conn->query($sqli);
            $results = $conn->query($alleSchepen);
            $wissen = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}