<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	input[type="button"]
	{
		height: 39px;
		width: 117px;
		color: white;
		background-color: dodgerblue;


	}	

	html,body {
    padding: 0;
    margin: 0;
    font: 14px 'Open sans', sans-serif;
    color: #333;
}
	</style>
	<title>INDEX</title>
	<meta charset="utf-8">
</head>
<body >

<table width="100%">
<tr bgcolor="darkturquoise" ><td><img src="colfimg.jpg" width="100%"></td><td width="50%"><h1 align="center"><i>BENVENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align="center"><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src="colfimg2.jpg" width="80%"></td></tr>	
<tr bgcolor="aquamarine"><td><ul></br></br><li><input type="button" name="home" value="home" onclick="location.href='index.php'"></li></br></br></br><li><input type="button" name="accedi" value="accedi" onclick="location.href='accedi.html'"></li></br></br></br><li><input type="button" name="registrati" value="registrati" onclick="location.href='registrati.html'"></li></br></br></br><li><input type="button" name="contatti" value="contatti" onclick="location.href='contatti.html'"></li></br></br></br><li><input type="button" name="FAQ" value="FAQ" onclick="location.href='FAQ2.html'"></li></ul></td><td><h4><p>M Ycolf offre la possibilità all'utente privato, di gestire in completa autonomia il rapporto di lavoro domestico.
Una volta effettuata la registazione sul sito si può disporre di un servizio di ricerca personalizzato e un servizio di prenotazione online, oltre a potersi avvalere della nostra assistenza via e-mail ogni qualvolta ne abbia bisogno.</p>

<p>Le colf possono disporre di un area per gestire gli orari e i giorni di disponibilità, e possono aggiornarli in qualsiasi momento, oltre a poter consultare i propri voti nella sezione apposita del sito.</p>

<p>Questo sito si basa su i feedback dati dagli utenti. I feedback possono essere pubblicati una volta prenotata la colf online. Questo sistema si basa sull' invio di una mail con dentro un invito tramite un link per lasciare un feedback.</p> 


</h4></td><td>
<?php 
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}

$ip= file_get_contents("http://ipecho.net/plain");
$res=file_get_contents('https://geoip-db.com/json/?ip='.$ip.'');
$res= json_decode($res);
echo "<h2 align='center'>CLASSIFICA COLF A <span style='text-transform: uppercase;''>".$res->city.":</span></h2> ";
$row=$connessione->query('select nome,cognome,età,cap,email,cellulare,round(avg(voto)) as valutazione from colf,riguardo,feedback where cf=colf and zona="'.$res->city.'" and feedback=codice group by cf  order by voto desc;');
while($result=$row->fetch_assoc())

{
echo"<table align='center' border='1' width='100%'><tr bgcolor='cornflowerblue'><th>Nome</th><th>Cognome</th><th>età</th><th>cap</th><th>email</th><th>cellulare</th><th>valutazione</th></tr><tr bgcolor='white'><td>".$result['nome']."</td><td>".$result['cognome']."</td><td>".$result['età']."</td><td>".$result['cap']."</td><td>".$result['email']."</td><td>".$result['cellulare']."</td><td align='center'>".$result['valutazione']."</td></tr></table>";

}


?>
</td></tr>
</table>

</body>
</html>