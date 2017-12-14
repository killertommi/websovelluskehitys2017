<?php
session_save_path('/home1-1/h/henripal/public_html/Elokuvaprojekti/session');
session_start();

/**
 * Created by PhpStorm.
 * User: henripal
 * Date: 27.11.2017
 * Time: 13.43
 */
require_once('php/config.php');

SSLon();
//Tänne tullaan kun ilogSign.php lomakkeella painetaan Kirjaudu painiketta
//Kayttaja/salasana kannassa?
//user oliossa kayttajatiedot jos ok, muuten false



$user = login($_POST['email'], $_POST['pwd'], $DBH);
//echo("1234".$_POST['email']. $_POST['pwd']);
//print_r($user);
if(!$user){
    $_SESSION['loggausvirhe'] = 'jep';
    //Aiheuttaa alert() pääsivulla
    redirect("index.php");
} else {
    unset($_SESSION['loggausvirhe']);
    //Jos käyttäjätunnistettiin, talletetaan tiedot sessioon esim. kassalle siirtymistä
    //varten on hyvä tietää asiakastiedot
    $_SESSION['kirjautunut'] = 'yes';
	$_SESSION['etunimi'] = $user->etunimi;
	$_SESSION['sukunimi'] = $user->sukunimi;
	$_SESSION['email'] = $user->sahkoposti;
    $_SESSION['uID'] = $user->KayttajaID;
    $_SESSION['profiilikuva'] = $user->profiilikuva;
    //print_r($_SESSION);
	//Jos loggaus onnistuu niin palataan paasivulle
	redirect('index.php'); //palataan pääsivulle kun koodin toiminnallisuus on käyty läpi
}

?>