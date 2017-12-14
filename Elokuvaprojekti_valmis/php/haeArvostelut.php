<?php
session_save_path('/home1-1/h/henripal/public_html/Elokuvaprojekti/session');
session_start();
require_once ('config.php');

if(isset($_GET['send'])) {
    $param = array('arvosana' => $_GET['arvosana'], 'palaute' => $_GET['palaute'], 'KayttajaID' => $_SESSION['uID'], 'ElokuvaID' => $_GET['filmID']);
    $kysely = $DBH->prepare("INSERT INTO Arvostelu (arvosana, arvostelu, KayttajaID, ElokuvaID) VALUES (:arvosana, :palaute, :KayttajaID, :ElokuvaID);");
    print_r($param);
    $kysely->execute($param);
    redirect('../index.php'); //palataan pääsivulle kun koodin toiminnallisuus on käyty läpi
}

?>