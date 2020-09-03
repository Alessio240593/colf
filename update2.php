<!DOCTYPE html>
<html>
<head>
	<title>UPDATE CLIENTE</title>
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
if(!empty($_POST['città']) and !empty($_POST['cap']) and !empty($_POST['email']) and !empty($_POST['password']))
{
$password=hash('SHA256',$_POST['password']);
$email=hash('sha256',$_POST['email']);
$id=$_SESSION['id'];
$row=$connessione->query("update cliente set città='".$_POST['città']."', cap='".$_POST['cap']."', email='".$email."', password='".$password."' where id='".$id."';");
						
if($row==TRUE)
{
header('location:homecliente.php');
$connessione->close();
}
else
	header('location:updateutente.php');
$connessione->close();

}
}
else
	header('location:accediutente.html');
?>
</body>
</html>