<html>
<head><title>Risposta</title>
<script src='https://code.jquery.com/jquery-3.1.0.min.js%27%3E></script>
<script type='text/javascript' src='js/script.js'></script>
<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

$Commento="";
$NomeUtente="";

include "connessione.php";

$Sql = "SELECT NomeUtente,Commento FROM sezioneCommenti";
$ricerca= mysqli_query($conn, $sql);

if($ricerca>0){
    while(mysqli_num_rows($ricerca)){
        <span style="color: #FFFFFF">
        echo "nome utente: " . $riga["NomeUtente"]. " - Commento : " . $riga["Commento"]. " . "<br>";"
        </span>
        }
}


mysqli_close($conn);

?>
</body>
</html>