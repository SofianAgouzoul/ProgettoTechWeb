<html>
<head><title>Risposta</title>
<script src='https://code.jquery.com/jquery-3.1.0.min.js%27%3E'></script>
<script type='text/javascript' src='js/script.js'></script>
<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

$Commento="";
$NomeUtente="";
if(isset($_POST['Commento']))
 $Commento= $_POST['Commento'];
 $NomeUtente=$_GET['NomeUtente']

 include "connessione.php";

 $sqlInsert="INSERT INTO sezioneCommenti(NomeUtente, Commento) VALUES ('".$NomeUtente."','".$Commento"')";
 $db_insert=mysqli_query($conn,$sqlInsert);

 if (!$db_insert) 
{
    $_SESSION["logged"] = "";
    $error = mysqli_error($conn);
    $findme = "PRIMARY";
    $pos = strpos($error, $findme);
    if($pos==false)
        die ("Errore  database: " . mysqli_error($conn)."<br><a href=Login_Registrazione.html>Torna alla pagina di registrazione</a></p>" );
    else
        die ("username ". $username . " non valido<br><a href=Login_Registrazione.html>Torna alla pagina di registrazione</a></p>" );
}
else
{
    $_SESSION['NomeUtente'] = $NomeUtente;
    $_SESSION['Password'] = $Password;
    $_SESSION["logged"] = "ok";
}

mysqli_close($conn);

?>
</body>
</html>