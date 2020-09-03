<!DOCTYPE html>
<html>
<head>
	<title>PRENOTA</title>
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


	</style>
</head>
<body>
<?php
session_start();
if($_SESSION['code']==session_id())
{
$utentemail = $_GET['email'];
$messaggio = "Contattaci qui al seguente indirizzo per lascire una tua opinione sulla colf ".$_SESSION['cf']." al link:feedback.html. Copia il codice fiscale da inserire in fase di pubblicazione feedback";
mail($utentemail,'valuta la colf', $messaggio);
$bool=(bool)TRUE;
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
$email=hash('sha256',$_GET['email']);
$id=$connessione->query('select id from cliente where email="'.$email.'";');
while ($result=$id->fetch_assoc()) 
{
	$idtrue=$result['id'];
}
$idtrue=(int)$idtrue;
$data=$_GET['date'];
$weekday = date('l', strtotime($_GET['date']));
$orai=(string)$_GET['orai'];
$oraf=(string)$_GET['oraf'];
$ora=$orai.'-'.$oraf;
if($weekday=='Monday')
$weekday='Lunedi';
elseif ($weekday=='Tuesday') 
$weekday='Martedi';
elseif ($weekday=='Wednesday')
$weekday='Mercoledi';
elseif ($weekday=='thursday') 
$weekday='Giovedi';
elseif ($weekday=='Friday') 
$weekday='Venerdi';
elseif ($weekday=='Saturday') 
$weekday='Sabato';
elseif ($weekday=='Sunday') 
$weekday='Domenica';
$row=$connessione->query("insert into sceglie values ('".$idtrue."','".$_GET['cf']."','".$data."','".$weekday."','".$ora."',".$bool.");");
if ($row==TRUE) 
{
	
echo("<table width='100%'>
<tr bgcolor='darkturquoise'><td><img src='colfimg.jpg' width='100%'></td><td width='50%'><h1 align='center'><i>BENENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align='center'><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src='colfimg2.jpg' width='80%'></td></tr>   
<tr bgcolor='aquamarine'><td><ul><li><input type='button' name='home' value='home' onclick='location.href='index.php''></li></br></br><li><input type='button' name='accedi' value='accedi' onclick='location.href='accedi.html''></li></br></br><li><input type='button' name='registrati' value='registrati' onclick='location.href='registrati.html''></li></br></br><li><input type='button' name='ricerca colf' value='ricerca colf'onclick='location.href=accediutente.html''></li></br></br><li><input type='button' name='inserisci orari' value='inserisci orari' onclick='location.href='accedicolf.html''></li></br></br><li><input type='button' name='prenota colf' value='prenota colf' onclick='location.href=accediutente2.html''></li></br></br><li><input type='button' name='contatti' value='contatti' onclick='location.href=contatti.html''></li></br></br><li><input type='button' name='FAQ' value='FAQ' onclick='location.href='FAQ2.html''></li></ul></td><td width='35%'><h1><i>INSERIMENTO PRENOTAZIONE RIUSCITA <i></h1><a href='homecliente.php'> <img src='ora.jpg' width='70%'></a><h2>Clicca l'immagine per tornare indietro!</h2></td>");
$connessione->close();
}
else
header("location:prenota.html");
$connessione->close();
 }

else
  header("location:accediutente2.html");
?>
<td><h2>CHI E' LA COLF E CHE COSA FA?</h2><h3><i>La collaboratrice domestica, o colf, può vivere assieme alla famiglia oppure venire a giornata, si occupa della casa e nello specifico della preparazione dei pasti, lavare e stirare, oltre alla gestione del guardaroba. Disponibile anche a trasferte e lavoro nei weekend, è la figura ideale per chi vuole ritagliarsi un momento per sè piuttosto che alla gestione della casa.

La colf o governante si occupa della casa e di tutti i lavori domestici:

stiratura
lavanderia
pulizie
cucinare
I materiali e le attrezzature saranno fornite dal cliente.</h3></i><img src="colf3.jpg"></td>
</tr>
</table>
</body>
</html>