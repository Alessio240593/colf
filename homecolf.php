
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	   <title>HOMECOLF</title>
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
	<title>REGISTRAZIONE COLF</title>
</head>
<body >

<table width="100%"  >
<tr bgcolor="darkturquoise"><td><img src="colfimg.jpg" width="100%"></td><td width="50%"><h1 align="center"><i>BENVENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align="center"><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src="colfimg2.jpg" width="80%"></td></tr>	
<tr bgcolor="aquamarine"><td><ul><li><input type="button" name="home" value="home" onclick="location.href='homecolf.php'"></li></br></br><li><input type="button" name="modifica dati" value="modifica dati" onclick="location.href='updatecolf.php'"></li></br></br><li><input type="button" name="cancella contatto" value="cancella contatto" onclick="location.href='deletecolf.html'"></li></br></br><li><input type="button" name="inserisci orari" value="inserisci orari" onclick="location.href='orari.php'"></li></br></br><li><input type="button" name="contatti" value="contatti" onclick="location.href='contatti.html'"></li></br></br><li><input type="button" name="FAQ" value="FAQ" onclick="location.href='FAQ2.html'"></li></br></br><li><input type="button" name="INDEX" value="INDEX" onclick="location.href='index.php'"></li></ul></td><td>
<?php
session_start();
$connessione=@ new mysqli('localhost','root','root','puliziedomicilio');
if ($connessione->connect_error) 
{
die('<h2></br><font color="red">ERRORE:</font>&nbsp<u><b>'.$connessione->connect_error.'</b></u></h2></br>'.'<h2><font color="red"> CODICE ERRORE N°:</font>&nbsp<u><b>'.$connessione->connect_errno.'</b></u></h2></br></br>');
}
$email=$_SESSION['email'];
$password=$_SESSION['passwordtrue'];
$cf=$_SESSION['cf'];
$row=$connessione->query('select * from colf where cf="'.$cf.'";');
while($result=$row->fetch_assoc())
{
echo"<p ><h1 align='center'><i>BENVENUTO <span style='text-transform: uppercase;''> ".$result['nome']." ".$result['cognome']." </span> ECCO I TUOI DATI</i></h1></br></p><table align='center' height='100px' border='1' width='100%' align='center'><tr bgcolor='cornflowerblue'><th>cf</th><th>Nome</th><th>Cognome</th><th>età</th><th>città</th><th>cap</th><th>email</th><th>password</th><th>cellulare</th></tr><tr bgcolor='white'><td>".$cf."</td><td>".$result['nome']."</td><td>".$result['cognome']."</td><td>".$result['età']."</td><td>".$result['zona']."</td><td>".$result['cap']."</td><td>".$email."</td><td>".$password."</td><td>".$result['cellulare']."</td></tr></table></br>";
}

$row2=$connessione->query('select * from propone where colf="'.$cf.'";');
echo"<p ><h1 align='center'><i> ECCO I TUOI ORARI</i></h1></br></p><table align='center' height='100px' border='1' width='100%' align='center'><tr bgcolor='cornflowerblue'><th>colf</th><th>Giorno</th><th>Ora</th></tr>";
while($result=$row2->fetch_assoc())
{
echo"<tr bgcolor='white'><td>".$cf."</td><td>".$result['giorno']."</td><td>".$result['ora']."</td></tr>";
}

?>
</table>
</td><td>
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