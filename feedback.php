<!DOCTYPE html>
<html>
<head>
	<title>INSERIMENTO FEEDBACK</title>
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
</head>
<body>
<?php
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
$data=date('Y-m-d');
$email=hash('sha256',$_GET['email']);
if(!EMPTY($_GET['descrizione']))
$row=$connessione->query("insert into feedback (voto,descrizione ) values ('".$_GET['voto']."','".$_GET['descrizione']."');");
else
$row=$connessione->query("insert into feedback (voto ) values ('".$_GET['voto']."');");
$row2=$connessione->query("select id from cliente where email='".$email."'");
while ($result=$row2->fetch_assoc()) 
{
	$id=$result['id'];
}
$row3=$connessione->query("select last_insert_id() as id from feedback group by id");
while ($result2=$row3->fetch_assoc()) 
{
	$feed=(int)$result2['id'];
}
$row4=$connessione->query("insert into pubblica values ('".$feed."','".$id."','".$data."');");
$row5=$connessione->query("insert into riguardo values ('".$feed."','".$_GET['cf']."');");
if($row==TRUE and $row4==TRUE and $row5==TRUE)
{
	
echo("<table width='100%'>
<tr bgcolor='darkturquoise'><td><img src='colfimg.jpg' width='100%'></td><td width='50%'><h1 align='center'><i>BENENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align='center'><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src='colfimg2.jpg' width='80%'></td></tr>   
<tr bgcolor='aquamarine'><td><ul><li><input type='button' name='home' value='home' onclick='location.href='index.php''></li></br></br><li><input type='button' name='accedi' value='accedi' onclick='location.href='accedi.html''></li></br></br><li><input type='button' name='registrati' value='registrati' onclick='location.href='registrati.html''></li></br></br><li><input type='button' name='ricerca colf' value='ricerca colf'onclick='location.href=accediutente.html''></li></br></br><li><input type='button' name='inserisci orari' value='inserisci orari' onclick='location.href='accedicolf.html''></li></br></br><li><input type='button' name='prenota colf' value='prenota colf' onclick='location.href=accediutente2.html''></li></br></br><li><input type='button' name='contatti' value='contatti' onclick='location.href=contatti.html''></li></br></br><li><input type='button' name='FAQ' value='FAQ' onclick='location.href='FAQ2.html''></li></ul></td><td width='35%'><h1><i>INSERIMENTO FEEDBACK RIUSCITO <i></h1><a href='index.php'> <img src='registrazione.jpg' width='70%'></a><h2>Clicca l'immagine per tornare indietro!</h2></td>");
$connessione->close();
}
else
	header('location:feedback.html');
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
}
</body>
</html>