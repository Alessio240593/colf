
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
	input[type="button"]
	{
		height: 30px;
		width: 100px;
		color: white;
		background-color: dodgerblue;


	}	
	table td
	{
		width: 10%;
	}
	label
	{
		color: white;
	}	
	input[type="text"]
	{
		color: white;
		height: 20px;
		width: 100px;
		background-color:dodgerblue;
	}
	</style>
	<title>RICERCA COLF</title>
</head>
<body >

<table width="100%"  >
<tr bgcolor="darkturquoise"><td><img src="colfimg.jpg" width="100%"></td><td width="50%"><h1 align="center"><i>BENVENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align="center"><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src="colfimg2.jpg" width="80%"></td></tr>   
<tr bgcolor="aquamarine"><td><ul><li><input type="button" name="home" value="home" onclick="location.href='homecliente.php'"></li></br></br><li><input type="button" name="modifica dati" value="modifica dati" onclick="location.href='updateutente.php'"></li></br></br><li><input type="button" name="cancella contatto" value="cancella contatto" onclick="location.href='deleteutente.php'"></li></br></br><li><input type="button" name="ricerca colf" value="ricerca colf" onclick="location.href='ricerca2.php'"></li></br></br><li><input type="button" name="prenota colf" value="prenota colf" onclick="location.href='prenota.html'"></li></br></br><li><input type="button" name="feedback" value="feedback" onclick="location.href='feedback.html'"></li></br></br><li><input type="button" name="contatti" value="contatti" onclick="location.href='contatti.html'"></li></br></br><li><input type="button" name="FAQ" value="FAQ" onclick="location.href='FAQ2.html'"></li></br></br><li><input type="button" name="INDEX" value="INDEX" onclick="location.href='index.php'"></li></ul></td><td width="35%"><td>
<?php
session_start();
if($_SESSION['code']==session_id())
{
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
$ip= file_get_contents("http://ipecho.net/plain");
$res=file_get_contents('https://geoip-db.com/json/?ip='.$ip.'');
$res= json_decode($res);

if(empty($_GET['cap']))
{
$row=$connessione->query('select cf,nome,cognome,età,cap,email,cellulare,disponibilità.giorno,disponibilità.ora from disponibilità,propone,colf where disponibilità.giorno=propone.giorno and disponibilità.ora=propone.ora
and colf in(select cf where zona="'.$_GET['città'].'")order by disponibilità.giorno,disponibilità.ora');
}
else
{
	$row=$connessione->query('select cf,nome,cognome,età,cap,email,cellulare,disponibilità.giorno,disponibilità.ora from disponibilità,propone,colf where disponibilità.giorno=propone.giorno and disponibilità.ora=propone.ora and colf in(select cf where zona="'.$_GET['città'].'" and cap="'.$_GET['cap'].'")order by disponibilità.giorno,disponibilità.ora');
}

if($connessione->affected_rows==0)
{
	echo "<h1 align='center'><font color='red'>ERRORE!</font></h1><h2><i>NON SONO STATE RISCONTRATE COLF PROVA A RIGUARDARE IL CAMPO RELATIVO ALLA CITTA' O AL CAP <i></h2><a href='ricerca2.php'> <img src='monster.png' width='70%'></a><h2>Clicca l' immagine per tornare indietro!</h2>";

}
else 
echo "<h1 align='center'>ELENCO ORARI COLF A <span style='text-transform: uppercase;''>".$_GET['città']."</span></h1><h3 align='center'><i><u>Copia il codice fiscale negli appunti, ti servirà in fase di prenotazione</u></i></h3></br></br> ";
while($result=$row->fetch_assoc())
{
echo"<table align='center' border='1'><tr bgcolor='cornflowerblue'><th>codice fiscale</th><th>Nome</th><th>Cognome</th><th>età</th><th>cap</th><th>email</th><th>cellulare</th><th>giorno</th><th>ora</hr></tr><tr bgcolor='white'><td>".$result['cf']."</td><td>".$result['nome']."</td><td>".$result['cognome']."</td><td>".$result['età']."</td><td>".$result['cap']."</td><td>".$result['email']."</td><td>".$result['cellulare']."</td><td align='center'>".$result['giorno']."</td><td align='center'>".$result['ora']."</td></tr></table>";
	 
}
$connessione->close();
}

else
	header('location:accediutente.html');
?>
</td>
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