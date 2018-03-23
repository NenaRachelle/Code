<script>
    function versturen() {
        var naam = document.getElementById("schipnaam").value;
        var lengte = document.getElementById("schiplengte").value;
        document.location = "schepenmaken.php?naam=" + naam + "&lengte=" + lengte;
    }
</script>

<?php

//In script het maken van de functie versturen die er voor zorgt dat de variabelen naam en lengte een locatie/waarde 
//krijgen toegestuurd. Ook wordt een locatie in de URL aangeduid waar bepaalde waardes te vinden zijn.

$servername = 'localhost';
$username = 'root';
$password = 'root';
$db = 'ZeeslagNickAlex';
//ff testen
$conn = mysqli_connect($servername, $username, $password, $db);
if(isset($_GET['naam']) && isset($_GET['lengte'])) {
	$naam = $_GET['naam'];
	$lengte = $_GET['lengte'];
	insertSchip($conn, $naam, $lengte);
}

//Er wordt ingelogd op de server van de database. Door middel van de naam van de server, de gebruikersnaam, 
//het wachtwoord en de naam van de database. Vervolgens wordt dit vastgelegd in een variabele conn (connectie). 
//Het if isset statement bepaal of een variabele is ingesteld en niet NULL is. Als dit zo is dan wordt dit uitgevoerd en 
//opgeslagen in schip.

echo '<input type = "text" placeholder = "Hoe heet je schip?" id="schimpnaam">';
echo '<input type = "text" placeholder = "Hoe lang is je schip?" id="schiplengte">';
echo '<input type = "button" value = "Versturen" onclick = versturen()> <br>';

//Dit laat twee tekstvelden zien en een knop. De tekstvelden zijn gevuld met plaats aanduidende tekst, 
//die aangeeft wat er ingevuld moet worden en dat wat er ingevuld word opgeslagen wordt in de juiste kolom en een id krijgt.

function insertSchip($conn, $naam, $lengte) {
	$conn->query('INSERT INTO schepen (naam, lengte) VALUES ("'.$naam.'", '.$lengte.');');
}

//Dit is een functie die de schepen invoert in de database. De waardes die ingevoerd worden zijn naam en lengte.
//$conn wordt meegegeven omdat je in een functie alleen variabelen kan gebruiken die meegegeven zijn of door de funtie gemaakt worden.
//Dus als $conn niet wordt meegegeven is het voor de functie een "lege" variabele.

function toonSchepen($conn) {
        $result = $conn->query('SELECT * FROM schepen');
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Je schip heet " . $row["naam"] . " en is " . $row["lengte"] . " plekken lang. <br>";
            }
        }
}

//Dit is een functie die schepen laat zien. 
//Via de connectie met de query worden alle schepen aangeroepen. 
//De if statement zorgt ervoor dat alles wordt getoond vanaf rij 0. 
//Het while statement zorgt ervoor dat alle resultaten uit de database getoond worden door middel van een variabele row. 
//De echo zorgt ervoor dat alles op het scherm geprint wordt door middel van 
//de variabele row die dan weer een bepaalde waarde op een bepaalde locatie aanroept.

toonSchepen($conn);

//Hier wordt de functie toonSchepen aangeroepen.

?>