<html>
    <head>
        <script>
            function saveShips(){
                var scheepsnaam = document.getElementById("scheepsnaam").value;
                var scheepslengte = document.getElementById("scheepslengte").value;
                var vaarsnelheid = document.getElementById("vaarsnelheid").value;
                var kleur = document.getElementById("kleur").value;
                document.location = "test.php?scheepsnaam="+scheepsnaam+"&scheepslengte="+scheepslengte+"&vaarsnelheid="+vaarsnelheid+"&kleur="+kleur;
            }
            function update(schipid){
                var scheepsnaam = document.getElementById("scheepsnaam").value;
                var scheepslengte = document.getElementById("scheepslengte").value;
                var vaarsnelheid = document.getElementById("vaarsnelheid").value;
                var kleur = document.getElementById("kleur").value;
                document.location = "updateschip.php?scheepsnaam="+scheepsnaam+"&scheepslengte="+scheepslengte+"&vaarsnelheid="+vaarsnelheid+"&kleur="+kleur+"&id="+schipid;
            }
            function verwijder(schipid){
                document.location = "wisschip.php?id="+schipid;
            }
        </script>
        
        <?php 
            $sn="localhost";
            $un="root";
            $pw="root";
            $db="boten";
            $conn = new mysqli($sn, $un, $pw, $db);
            $scheepsnaam = $_GET['scheepsnaam'];
            $sql = "INSERT INTO boten(scheepsnaam, scheepslengte, vaarsnelheid, kleur) VALUES ('$scheepsnaam',".$_GET['scheepslengte'].",".$_GET['vaarsnelheid'].",'".$_GET['kleur']."');";
            $alleSchepen = "SELECT * FROM boten;";
            
            $delete = "DELETE FROM `boten` WHERE `scheepsnaam`";
            
            $conn->query($sql);
            $results = $conn->query($alleSchepen);
            $wissen = $conn->query($delete);
            
            ?>
    </head>
    <body>
        Schepen opslaan:
        <input type="text" id="scheepsnaam" placeholder="scheepsnaam">
        <input type="text" id="scheepslengte" placeholder="scheepslengte">
        <input type="text" id="vaarsnelheid" placeholder="vaarsnelheid">
        <input type="text" id="kleur" placeholder="kleur">
        <input type="button" onclick="saveShips()" value="Versturen"><br><br>
        
       Schepen updaten:
        <input type="text" id="scheepsnaam2" placeholder="scheepsnaam">
        <input type="text" id="scheepslengte2" placeholder="scheepslengte">
        <input type="text" id="vaarsnelheid2" placeholder="vaarsnelheid">
        <input type="text" id="kleur2" placeholder="kleur">
        <input type="button" onclick="update(schipid)" value="Updaten"><br><br>
        
                <?php
            echo "<ul>";
//            foreach($results as $result){
            while($row = $results->fetch_assoc()){
                echo "<li>";
                echo $row['scheepsnaam'];
                echo "<input type=button onclick=update(".$row['ID'].") value=Updaten>";
                echo "<input type=button onclick=verwijder(".$row['ID'].") value=Verwijder></li>\n";
  //          }
            }
            echo "</ul>";
        ?>
    </body>
</html>


