<?php
/**
 * Created by PhpStorm.
 * User: tommilag
 * Date: 9.11.2017
 * Time: 9.33
 */

//This works in 5.2.3
//First function turns SSL on if it is off.
//Second function detects if SSL is on, if it is, turns it off.


//palaute

/**
 *
 * Hakee annetusta kannasta enintään annetun määrän uusimpia mediatuoteita.
 * @param tietokantaosoitin $DBH
 * @param montako mediatuotetta halutaan $count
 * @return $mediat taulukko olioista
 */
function getNewestMedia($DBH, $count){
    try {
        //Haetaan $count muuttujan arvon verran uusimpia kuvia
        $mediaTuotteet = array(); //Taulukko haettaville kuva-olioille (mediatuote)

        $STH = $DBH->query("SELECT mediaThumb FROM Elokuva
		  ORDER BY Elokuva.ElokuvaID LIMIT $count");

        $STH->setFetchMode(PDO::FETCH_OBJ);  //yksi rivi objektina
        while($mediaTuote = $STH->fetch()){
            $mediaTuotteet[] = $mediaTuote; //Lisätään objekti taulukon loppuun
        }
        return $mediaTuotteet;
    } catch(PDOException $e) {
        echo $e->getMessage();
        file_put_contents('log/DBErrors.txt', 'getNewest): '.$e->getMessage()."\n", FILE_APPEND);
        return false;
    }}



