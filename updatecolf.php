
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	   <title>UPDATE</title>
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
	<title>UPDATE COLF</title>
</head>
<body >


<table width="100%"  >
<tr bgcolor="darkturquoise"><td><img src="colfimg.jpg" width="100%"></td><td width="50%"><h1 align="center"><i>BENVENUTO NEL NOSTRO SITO PER LA RICERCA DI COLF</h1></i></br>
<h2 align="center"><i>il nostro sito ti permette di ricercare la colf adatta a te</h2></i></td><td><img src="colfimg2.jpg" width="80%"></td></tr>   
<tr bgcolor="aquamarine"><td><ul><li><input type="button" name="home" value="home" onclick="location.href='homecolf.php'"></li></br></br><li><input type="button" name="modifica dati" value="modifica dati" onclick="location.href='updatecolf.php'"></li></br></br><li><input type="button" name="cancella contatto" value="cancella contatto" onclick="location.href='deletecolf.html'"></li></br></br><li><input type="button" name="inserisci orari" value="inserisci orari" onclick="location.href='orari.php'"></li></br></br><li><input type="button" name="contatti" value="contatti" onclick="location.href='contatti.html'"></li></br></br><li><input type="button" name="FAQ" value="FAQ" onclick="location.href='FAQ2.html'"></li></br></br><li><input type="button" name="INDEX" value="INDEX" onclick="location.href='index.php'"></li></ul></td><td width="35%">
	
 <form method="POST" action="update.php">
    <table>
            <tr><td><h1>Aggiorna i tuoi dati</h1></td></tr>
                    <tr><td><label></br>Città:</label>&nbsp
            <input type="text" name="città" placeholder="inserire città" required  autocomplete="off" pattern="^[A-Z]{1}.[a-z]+$"></br></br></td></tr>
            <tr bgcolor="black" height="1"><td></td></tr>
            <tr><td><label></br>Cap:</label>&nbsp
            <input type="text" name="cap" placeholder="inserire cap" required autocomplete="off" pattern="[0-9]{5,}" maxlength="5"></br></br></td></tr>
            <tr bgcolor="black" height="1"><td></td></tr>
                <tr><td><label></br>Email:</label>&nbsp
                 <input type="email" name="email" placeholder="inserire indirizzo email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required  autocomplete="off" >   
               </br></br></td></tr>
                <tr bgcolor="black" height="1"><td></td></tr>
                <tr><td><label></br>Password:</label>&nbsp
                 <input type="password" name="password" value="password" pattern="[a-z]{,5}[0-9]{,5}" maxlength="10" required autocomplete="off" >   
               </br></br></td></tr>
                    <tr bgcolor="black" height="1"><td></td></tr>
                <tr><td><label></br>Cellulare:</label>&nbsp
                 <input type="cellulare" name="cellulare" placeholder="inserire numero di cellulare" pattern="^[0-9]{10}$" required  autocomplete="off" maxlength="10" >   
               </br></br></td></tr>
               <tr bgcolor="black" height="1"><td></td></tr>
        <tr><td></br><input type="submit" name="submit" value="Aggiorna">&nbsp &nbsp &nbsp &nbsp
                <input  type="reset" name="reset" value="cancella"></br></br></td></tr>
               </table>
        </form>



</td><td>
<h2>CHI E' LA COLF E CHE COSA FA?</h2><h3><i>La collaboratrice domestica, o colf, può vivere assieme alla famiglia oppure venire a giornata, si occupa della casa e nello specifico della preparazione dei pasti, lavare e stirare, oltre alla gestione del guardaroba. Disponibile anche a trasferte e lavoro nei weekend, è la figura ideale per chi vuole ritagliarsi un momento per sè piuttosto che alla gestione della casa.

La colf o governante si occupa della casa e di tutti i lavori domestici:

stiratura
lavanderia
pulizie
cucinare
I materiali e le attrezzature saranno fornite dal cliente.</h3></i><img src="colf3.jpg"></td></td></tr>
</table>

</body>
</html>