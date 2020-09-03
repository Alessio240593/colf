<!DOCTYPE html>
<html>
<head>
	<title>UPDATE COLF</title>
</head>
<body>
<?php
session_start();
if($_SESSION['code']==session_id())
{
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
if(!empty($_POST['città']) and !empty($_POST['cap']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['cellulare']))
{
$password=hash('SHA256',$_POST['password']);

$cf=$_SESSION['cf'];
$row=$connessione->query("update colf set zona='".$_POST['città']."', cap='".$_POST['cap']."', email='".$_POST['email']."', password='".$password."', cellulare='".$_POST['cellulare']."' where cf='".$cf."';");
						
if($row==TRUE)
{

header('location:homecolf.php');
$connessione->close();
}
else
	header('location:updatecolf.php');
$connessione->close();

}
}
header('location:accedicolf.html');

?>
</body>
</html>