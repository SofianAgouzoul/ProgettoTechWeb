<html>
<head><title>Login</title>
<script src='https://code.jquery.com/jquery-3.1.0.min.js%27%3E'></script>
<script type='text/javascript' src='js/script.js'></script>
<link rel="stylesheet" href="style.css">
</head>
<?php

session_start();
$username="";
$password="";


if(isset($_POST['NomeUtente']))
 $username= $_POST['NomeUtente'];
if(isset($_POST['Password']))
 $password= $_POST['Password'];

include "connessione.php";

$sqlSelect="select NomeUtente,Email from utente where username ='".$username."' and password = '".$password."'";

$ricerca= mysqli_query($conn,$sqlSelect);
$num_rows = mysqli_num_rows($ricerca);

if($num_rows >0)
{
    while($utenti=mysqli_fetch_array($ricerca))
    {
        $NomeUtente = $utenti['Nomeutente'];
        $Email = $utenti['Email'];
    }



//Salvo i dati...
$_SESSION['NomeUtente'] = $username;
$_SESSION['Password'] = $password;
$_SESSION["logged"] = "ok";

header("Location: ./prodottidaordinare.php");
}
else
{
    $_SESSION["logged"] = "";
    $sqlSelect="select NomeUtente,Email from  utente where username ='".$username."'";
    $ricerca= mysqli_query($conn,$sqlSelect);
    $num_rows = mysqli_num_rows($ricerca);
    if($num_rows >0)
        echo "<body> password non corretta <br><a href=./../index.html>Torna alla pagina di registrazione</a></p>";
    else
        echo "<body> username non valido <br><a href=./../index.html>Torna alla pagina di registrazione</a></p>";
}
mysqli_close($conn);

?>
</body>
</html>