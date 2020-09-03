
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	   <title>DELETE</title>
	<style type="text/css">
	input[type="button"]
	{
		height: 30px;
		width: 100px;
		color: white;
		background-color: dodgerblue;


	}	
	
	label
	{
		color: brown;
	}	
	input[type="text"]
	{
		color:black;
		height: 20px;
		width: 100px;
		background-color:white;
	}

html,body {
    padding: 0;
    margin: 0;
    font: 14px 'Open sans', sans-serif;
    color: #333;
}

form {
    padding: 40px;
    background: #DDD;
    border: 4px solid #AAA;
    width: 360px;
    margin: 30px auto;
}
input[type="submit"]
{

    background-color: brown;
    height: 40px;
    width: 90px;
    border :none;
    border-radius: 10px 10px 10px 10px;
}
input[type="reset"]
{

    background-color: brown;
    height: 40px;
    width: 90px;
    border :none;
    border-radius: 10px 10px 10px 10px;
}

.e
{
    width: 20%;
}
	</style>
	<title>DELETE UTENTE</title>
</head>
<body>
<?php
session_start();
if($_SESSION['code']==session_id())
{
if(hash('sha256',$_POST['email'])==$_SESSION['email'])
{
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
$password=hash('SHA256',$_POST['password']);
$email=hash('sha256',$_POST['email']);
if($row3=$connessione->query("select * from sceglie where cliente='".$_SESSION['id']."';")==TRUE and $row4=$connessione->query("select * from pubblica where cliente='".$_SESSION['id']."';")==TRUE)
{
$row=$connessione->query("delete from sceglie where cliente='".$_SESSION['id']."';");
$row=$connessione->query(" delete from pubblica where cliente='".$_SESSION['id']."';");
$row=$connessione->query(" delete from cliente where id='".$_SESSION['id']."';");  
}
elseif($row3=$connessione->query("select * from sceglie where cliente='".$_SESSION['id']."';")==TRUE)
{
$row=$connessione->query("delete from sceglie where cliente='".$_SESSION['id']."';");
$row=$connessione->query(" delete from cliente where id='".$_SESSION['id']."';");  
}
elseif($row4=$connessione->query("select * from pubblica where cliente='".$_SESSION['id']."';")==TRUE)
{
$row=$connessione->query(" delete from pubblica where cliente='".$_SESSION['id']."';");
$row=$connessione->query(" delete from cliente where id='".$_SESSION['id']."';");  
}
else
$row=$connessione->query(" delete from cliente where id='".$_SESSION['id']."';");

if($connessione->affected_rows >0)
{
	
echo("<table width='100%'>
<tr bgcolor='darkturquoise'><td><img src='colfimg.jpg' width='100%'></td><td width='50%'><h1 align='center'><i>BENENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align='center'><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src='colfimg2.jpg' width='80%'></td></tr>   
<tr bgcolor='aquamarine'><td><ul><li><input type='button' name='home' value='home' onclick='location.href='index.php''></li></br></br><li><input type='button' name='accedi' value='accedi' onclick='location.href='accedi.html''></li></br></br><li><input type='button' name='registrati' value='registrati' onclick='location.href='registrati.html''></li></br></br><li><input type='button' name='ricerca colf' value='ricerca colf'onclick='location.href=accediutente.html''></li></br></br><li><input type='button' name='inserisci orari' value='inserisci orari' onclick='location.href='accedicolf.html''></li></br></br><li><input type='button' name='prenota colf' value='prenota colf' onclick='location.href=accediutente2.html''></li></br></br><li><input type='button' name='contatti' value='contatti' onclick='location.href=contatti.html''></li></br></br><li><input type='button' name='FAQ' value='FAQ' onclick='location.href='FAQ2.html''></li></ul></td><td width='35%'><h1><i>CONTATTO ELIMINATO CON SUCCESSO <i></h1><a href='index.php'> <img src='cestino.jpg' width='70%'></a><h2>Clicca l'immagine per tornare indietro!</h2></td>");
}
else
	header("location:deleteutente.php");
 
	
}
else
	header("location:deleteutente.php");
}
else
header("location:accediutente.html");
?>
<td>
<h2>CHI E' LA COLF E CHE COSA FA?</h2><h3><i>La collaboratrice domestica, o colf, può vivere assieme alla famiglia oppure venire a giornata, si occupa della casa e nello specifico della preparazione dei pasti, lavare e stirare, oltre alla gestione del guardaroba. Disponibile anche a trasferte e lavoro nei weekend, è la figura ideale per chi vuole ritagliarsi un momento per sè piuttosto che alla gestione della casa.

La colf o governante si occupa della casa e di tutti i lavori domestici:

stiratura
lavanderia
pulizie
cucinare
I materiali e le attrezzature saranno fornite dal cliente.</h3></i><img src="colf3.jpg"></td></td></tr>
</table>

</body>
</body>
</html>