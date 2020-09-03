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

$email=$_POST['username'];
$password=hash('SHA256',$_POST['password']);

$cf=$connessione->query("select cf from colf where email='".$email."';");
while ($result2=$cf->fetch_assoc()) {
	$cftrue=$result2['cf'];
}
$row=$connessione->query("select email,password from colf where email='".$email."';");
while ($result=$row->fetch_assoc()) {
	$emailtrue=$result['email'];
	$passwordtrue=$result['password'];
}
if($emailtrue==$email and $passwordtrue==$password)
{

	session_start();
	$_SESSION['codice']=session_id();
	$_SESSION['cf']=$cftrue;
	$_SESSION['email']=$email;
	header("location:homecolf.php");
	$connessione->close();
}

else
	header("location:accedicolf.html"); 
?>
</body>
</html>