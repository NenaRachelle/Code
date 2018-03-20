<html>
    <head>
        <script>
            function oefenajax(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("demo").innerHTML = xhttp.responseText;
                    }
                };
                xhttp.open("GET", "ajaxtest.php", true);
                xhttp.send();
            }
        </script>
    </head>
    <body>        
        <input type="text">
        <input type="button" onclick="oefenajax()" value="start ajax">
        <div id="demo" >testtekst</div>
    </body>    
</html>

<!--<html>
    <head>
        <script>
           function oefenajax(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {                   
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("demo").innerHTML = xhttp.responseText;
                    }
                };
                xhttp.open("GET", "ajaxtest.php", true);
                xhttp.send();
           }
        </script>
    </head>
    <body>
        <input type="text">
        <input type="button" onclick="oefenajax()" value="start ajax">
        <div id="demo" >testtekst</div>
    </body>    
</html>

-->
