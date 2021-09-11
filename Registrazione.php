<html>
<head><title>Risposta</title>
<script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
<script type='text/javascript' src='js/script.js'></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
session_start();

$confpassword="";
$password="";
$username="";
$email="";
if(isset($_POST['NomeUtente']))
 $username= $_POST['NomeUtente'];
if(isset($_POST['Password']))
 $password= $_POST['Password'];
if(isset($_POST['confpassword']))
 $confpassword= $_POST['confpassword'];
 if(isset($_POST['email']))
 $email= $_POST['email'];

include 'Connessione.php';  


$sqlInsert="INSERT INTO sezioneUtenti (NomeUtente, Password, confpassword, email) VALUES ('".$username."','".$password."','".$confpassword."','".$email."')";	
$db_insert=mysqli_query($conn,$sqlInsert);
if (!$db_insert) 
{
	$_SESSION["logged"] = "";
	$error = mysqli_error($conn);
	$findme = "PRIMARY";
	$pos = strpos($error, $findme);
	if($pos==false)
        die ("Errore  database: " . mysqli_error($conn)."<br><a href=registrati.html>Torna alla pagina di registrazione</a></p>" );
	else
		die ("username ". $username . " non valido<br><a href=registrati.html>Torna alla pagina di registrazione</a></p>" );
}
else
{
	$_SESSION['NomeUtente'] = $username;
	$_SESSION['Password'] = $password;
	$_SESSION["logged"] = "ok";
}

include 'menu.php';

mysqli_close($conn);
	
?>
</body>
</html>