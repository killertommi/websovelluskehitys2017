<?php
require_once("config.php");  //Miten hakemistopolut?
//Avataan tietokantayhteys

//Kaikkien tuotteiden nimen ja hinnan kysely
$kysely2 = $DBH->prepare("select * from Elokuva");
$kysely2->execute();