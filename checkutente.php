<!DOCTYPE html>
<html>
<head>
	<title>CHECK COLF</title>
</head>
<body>
<?php

$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
$email=hash('SHA256',$_POST['username']);
$password=hash('SHA256',$_POST['password']);
$emailtrue2=$_POST['username'];
$passwordtrue2=$_POST['password'];
$row=$connessione->query("select id,email,password from cliente where email='".$email."'");
while ($result=$row->fetch_assoc()) {
	$emailtrue=$result['email'];
	$passwordtrue=$result['password'];
	$id=$result['id'];
}
if($emailtrue==$email and $passwordtrue==$password)
{

	session_start();
	$_SESSION['code']=session_id();
	$_SESSION['id']=$id;
	$_SESSION['email']=$email;
	$_SESSION['emailtrue']=$emailtrue2;
	$_SESSION['passwordtrue']=$passwordtrue2;
	header("location:homecliente.php");
	$connessione->close();
}

else
	header("location:accediutente.html"); 
?>
</body>
</html>