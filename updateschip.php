<html>
    <head>
        <script>
            function update(schipid){
            var scheepsnaam = document.getElementById("scheepsnaam").value;
            var scheepslengte = document.getElementById("scheepslengte").value;
            var vaarsnelheid = document.getElementById("vaarsnelheid").value;
            var kleur = document.getElementById("kleur").value;
            document.location = "updateschip.php?scheepsnaam="+scheepsnaam+"&scheepslengte="+scheepslengte+"&vaarsnelheid="+vaarsnelheid+"&kleur="+kleur+"&id="+schipid;
            }
        </script>
    </head>
    <body>
<!--        Schepen updaten:
        <input type="text" id="scheepsnaam" placeholder="scheepsnaam">
        <input type="text" id="scheepslengte" placeholder="scheepslengte">
        <input type="text" id="vaarsnelheid" placeholder="vaarsnelheid">
        <input type="text" id="kleur" placeholder="kleur">
        <input type="button" onclick="update(schipid)" value="Updaten"><br><br>-->
    </body>
</html>



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
            $sql = "UPDATE `boten` SET ('$scheepsnaam',".$_GET['scheepslengte'].",".$_GET['vaarsnelheid'].",'".$_GET['kleur']."') WHERE `id` = $id";
            
            $conn->query($sqli);
            $results = $conn->query($alleSchepen);
            $wissen = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



//UPDATE `boten` SET `ID`=[value-1],`scheepsnaam`=[value-2],`scheepslengte`=[value-3],`vaarsnelheid`=[value-4],`kleur`=[value-5] WHERE 1