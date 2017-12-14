<?php
require_once('config.php');
try {

    $param = $_GET['id'];

    $SQL = "SELECT Kayttaja.etunimi, Arvostelu.arvosana, Arvostelu.arvostelu FROM Arvostelu JOIN Kayttaja ON Arvostelu.KayttajaID = Kayttaja.KayttajaID WHERE Arvostelu.ElokuvaID = :id";
    $kysely = $DBH->prepare($SQL);
    $kysely->bindParam(':id', $param);
    $kysely->execute();
    $kysely->setFetchMode(PDO::FETCH_OBJ);
    $rivit = array();
    while ($rivi = $kysely->fetch()) {
        $rivit[] = $rivi;
    }
    echo json_encode($rivit);
} catch (PDOException $e) {
    $error['error'] = $e->getMessage();
    echo json_encode($error);
}

