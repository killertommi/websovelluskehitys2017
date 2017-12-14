
<?php
require_once('config.php');
try {
    $SQL = "SELECT ElokuvaID, nimi, vuosi, kuvaus, arvosanaTotal, mediaUrl, mediaThumb FROM Elokuva";
    $STH = $DBH->query($SQL);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    $rivit = array();
    while ($rivi = $STH->fetch()) {
        $rivit[] = $rivi;
    }
    echo json_encode($rivit);
} catch (PDOException $e) {
    $error['error'] = $e->getMessage();
    echo json_encode($error);
}