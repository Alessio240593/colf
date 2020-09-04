
![Octocat](https://user-images.githubusercontent.com/67499233/92142595-60dbde00-ee14-11ea-9b90-9793eb873280.jpg)


# Sito per ricerca e prenotazioni colf

#### Qui di seguito vengono riportate le istruzioni sql, per creare sia il database che le tabelle compatibili con il sito.

### 1) creare il database

``` Sql

Create database puliziedomicilio;

```
### 2)creare le tabelle
CLIENTE
``` Sql

CREATE TABLE `cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `età` int(2) NOT NULL,
  `città` varchar(30) NOT NULL,
  `cap` int(5) NOT NULL,
  `email` char(64) NOT NULL,
  `password` char(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
);
``` 
COLF
``` Sql

CREATE TABLE `colf` (
  `cf` char(16) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `età` int(2) NOT NULL,
  `zona` varchar(30) NOT NULL,
  `cap` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` char(64) NOT NULL,
  `cellulare` char(10) NOT NULL,
  PRIMARY KEY (`cf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
);
```
DISPONIBILITA'
``` Sql

CREATE TABLE `disponibilità` (
  `giorno` varchar(10) NOT NULL,
  `ora` varchar(6) NOT NULL,
  PRIMARY KEY (`giorno`,`ora`)
);
``` 
FEEDBACK
``` Sql

CREATE TABLE `feedback` (
  `codice` int(10) NOT NULL AUTO_INCREMENT,
  `voto` int(2) NOT NULL,
  `descrizione` text,
  PRIMARY KEY (`codice`)
);
``` 
PROPONE
``` Sql

CREATE TABLE `propone` (
  `colf` char(16) NOT NULL,
  `giorno` varchar(20) NOT NULL,
  `ora` varchar(6) NOT NULL,
  PRIMARY KEY (`colf`,`giorno`,`ora`),
  KEY `colf_idx` (`colf`),
  KEY `giorno_2_idx` (`giorno`),
  KEY `propone_ibfk_1` (`giorno`,`ora`),
  CONSTRAINT `colf_3` FOREIGN KEY (`colf`) REFERENCES `colf` (`cf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `propone_ibfk_1` FOREIGN KEY (`giorno`, `ora`) REFERENCES `disponibilità` (`giorno`, `ora`) ON DELETE CASCADE ON UPDATE CASCADE
);

``` 
PUBBLICA
``` Sql

CREATE TABLE `pubblica` (
  `feedback` int(10) NOT NULL,
  `cliente` int(10) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`feedback`),
  KEY `cliente_5_idx` (`cliente`),
  CONSTRAINT `cliente_5` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `feedback` FOREIGN KEY (`feedback`) REFERENCES `feedback` (`codice`) ON DELETE CASCADE ON UPDATE CASCADE
);
``` 
RIGUARDO
``` Sql
CREATE TABLE `riguardo` (
  `feedback` int(10) NOT NULL,
  `colf` char(16) NOT NULL,
  PRIMARY KEY (`feedback`),
  KEY `colf_3_idx` (`colf`),
  CONSTRAINT `colf_4` FOREIGN KEY (`colf`) REFERENCES `colf` (`cf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `feed_2` FOREIGN KEY (`feedback`) REFERENCES `feedback` (`codice`) ON DELETE CASCADE ON UPDATE CASCADE);
  ``` 
   SCEGLIE
``` Sql
CREATE TABLE `sceglie` (
  `cliente` int(10) NOT NULL,
  `colf` char(16) NOT NULL,
  `data` date NOT NULL,
  `giorno` varchar(20) NOT NULL,
  `ora` varchar(6) NOT NULL,
  `email` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cliente`,`colf`,`data`,`giorno`,`ora`),
  KEY `colf_8_idx` (`colf`,`giorno`,`ora`),
  KEY `colf10_idx` (`giorno`,`ora`,`colf`),
  CONSTRAINT `cliente_7` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `colf10` FOREIGN KEY (`giorno`, `ora`, `colf`) REFERENCES `propone` (`giorno`, `ora`, `colf`)
);
  ``` 




