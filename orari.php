<!DOCTYPE html>
<html>
<head>
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
	<title>ORARI</title>
</head>
<body >

<table width="100%"  >
<tr bgcolor="darkturquoise"><td><img src="colfimg.jpg" width="100%"></td><td width="50%"><h1 align="center"><i>BENVENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align="center"><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src="colfimg2.jpg" width="80%"></td></tr>   
<tr bgcolor="aquamarine"><td><ul><li><input type="button" name="home" value="home" onclick="location.href='homecolf.php'"></li></br></br><li><input type="button" name="modifica dati" value="modifica dati" onclick="location.href='updatecolf.php'"></li></br></br><li><input type="button" name="cancella contatto" value="cancella contatto" onclick="location.href='deletecolf.html'"></li></br></br><li><input type="button" name="inserisci orari" value="inserisci orari" onclick="location.href='orari.php'"></li></br></br><li><input type="button" name="contatti" value="contatti" onclick="location.href='contatti.html'"></li></br></br><li><input type="button" name="FAQ" value="FAQ" onclick="location.href='FAQ2.html'"></li></br></br><li><input type="button" name="INDEX" value="INDEX" onclick="location.href='index.php'"></li></ul></td><td width="35%">

  <form method="GET" action="inserisciorari.php">
            <h1>Inserisci gli orari:</h1>
            <p><label for="cf">Inserire email:&nbsp</label><input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" name="email"></p>
            <p><label for="giorno">Inserire giorno:&nbsp</label><select name="giorno">
			<option value="lunedi">lunedi</option>
		    <option value="martedi">martedi</option>
            <option value="mercoldi">mercoledi</option>
            <option value="giovedi">giovedi</option>
			<option value="venerdi">venerdi</option>
            <option value="sabato">sabato</option> 
            <option value="domenica">domenica</option></select></p>
            <p><label for="ora">Inserire ora iniziale:&nbsp</label><select name="orai">
            <option value="1">1</option>
			<option value="2">2</option>
            <option value="3">3</option> 
            <option value="4">4</option>
            <option value="5">5</option>
		    <option value="6">6</option>
            <option value="7">7</option>
			<option value="8">8</option>
		    <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
			<option value="12">12</option>
            <option value="13">13</option> 
            <option value="14">14</option>
        	<option value="15">15</option>
		    <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
			<option value="19">19</option>
            <option value="20">20</option> 
            <option value="21">21</option>
        	<option value="22">22</option>
		    <option value="23">23</option>
            <option value="24">24</option>
            </select>
        </p>
         <p><label for="ora">Inserire ora finale:&nbsp</label><select name="oraf">
         	 <option value="1">1</option>
			<option value="2">2</option>
            <option value="3">3</option> 
            <option value="4">4</option>
            <option value="5">5</option>
		    <option value="6">6</option>
            <option value="7">7</option>
			<option value="8">8</option>
		    <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
			<option value="12">12</option>
            <option value="13">13</option> 
            <option value="14">14</option>
        	<option value="15">15</option>
		    <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
			<option value="19">19</option>
            <option value="20">20</option> 
            <option value="21">21</option>
        	<option value="22">22</option>
		    <option value="23">23</option>
            <option value="24">24</option>
          
            </select>
        </p>
            <button  class="id" type="submit" name="login">Inserisci</button>&nbsp&nbsp
            <button  class="id" type="reset" name="cancella">Cancella</button>
            <p><i>Vuoi modificare i tuoi dati?Clicca qui:&nbsp<a href="updatecolf.php">Aggiorna i dati-!</a>  </i></p>
        </form>









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