<html>
<head>
<script>
    function schrijfin(){
                var data = {};
                data.voornaam = document.getElementById("voornaam").value;
                data.achternaam = document.getElementById("achternaam").value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if(this.readyState === 4 && this.status === 200){
                        console.log(this.responseText);
//                        document.getElementById("response").value = "go";
                    
                    }
                }
                data = JSON.stringify(data);                
                xhttp.open("POST", 'inschrijven.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("test="+data);
            }
            function uitschrijven(){
                var xh = new XMLHttpRequest();
                xh.onreadystatechange = function(){
                    if(this.readyState === 4 && this.status === 200){
                        console.log(this.responseText);
                    }
                }
                xh.open("GET", 'JSON.php', true);
                xh.send();
            }

</script>
</head>
    <H1>Registreren:</H1><br>
    <input type = "text" id = "voornaam" placeholder="voornaam"><br>
    <input type = "text" id = "achternaam" placeholder="achternaam"><br>
    <input type = "text" id = "leeftijd" placeholder="leeftijd"><br>
    <input type = "text" id = "klas" placeholder="klas"><br>
    <br>
    <input type = "text" id = "gebruikersnaam" placeholder="gebruikersnaam"><br>
    <input type = "text" id = "wachtwoord" placeholder="wachtwoord"><br>
    <input type = "button" id = "inschrijven" value = "Versturen" onclick="schrijfin()">
    <input type="button" value="Schrijf uit" onclick="uitschrijven()">

</body>
</html>
