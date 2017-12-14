<?php
session_save_path('/home1-1/h/henripal/public_html/Elokuvaprojekti/session');
session_start();

/**
 * Created by PhpStorm.
 * User: henripal
 * Date: 27.11.2017
 * Time: 10.38
 */

require_once('php/config.php');

SSLon();

$userdata = unserialize($_SESSION['lomakedata']);  //tekstimuodosta takaisin taulukoksi
var_dump($userdata);
$data['email'] = $userdata['email'];
try {
    $STH = $DBH->prepare("SELECT * FROM Kayttaja WHERE sahkoposti=:email");
    $STH->execute($data);
    $row = $STH->fetch();  //Löytyiko sama email osoite?
    if($STH->rowCount() == 0){ //Jos ei niin rekisteröidään
        // lisää suola '!!'
        $userdata['pwd'] = md5($userdata['pwd'].'!!');  //hashataan salasana suolalla

        try {
            $SQL = "INSERT INTO Kayttaja (etunimi, sukunimi, sahkoposti, salasana, profiilikuva)
			VALUES (:etunimi, :sukunimi, :email, :pwd, :file);";
            $STH2 = $DBH->prepare("INSERT INTO Kayttaja (etunimi, sukunimi, sahkoposti, salasana, profiilikuva)
			VALUES (:etunimi, :sukunimi, :email, :pwd, :file);");
            echo($SQL);
            if($STH2->execute($userdata)){
                try {
                    //Jos käyttäjän tallennus onnistui asetetaan hänet loggautuneeksi
                    //eli kirjoitetaan käyttäjätiedot myös sessiomuuttujiin
                    $sql = "SELECT * FROM Kayttaja WHERE KayttajaID = ".$DBH->lastInsertId().";";
                    $STH3 = $DBH->query($sql);
                    $STH3->setFetchMode(PDO::FETCH_OBJ);
                    $user = $STH3->fetch();
                    $_SESSION['kirjautunut'] = 'yes';
                    $_SESSION['etunimi'] = $user->etunimi;
                    $_SESSION['sukunimi'] = $user->sukunimi;
                    $_SESSION['email'] = $user->email;
                    $_SESSION['profiilikuva'] = $user->profiilikuva;
                    redirect("index.php");  //Palaa heti index.php sivulle
                } catch(PDOException $e) {
                    echo 'Käyttäjän tietojen hakuerhe: '.$e->getMessage();
                    // file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 3:
                    //'.$e->getMessage()."\n", FILE_APPEND);
                }
            }
        } catch(PDOException $e) {
            echo 'Tietojen lisäyserhe'.$e->getMessage();
            file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 2: '.$e->getMessage()."\n",
                FILE_APPEND);
        }
    } else { 	echo 'Käyttäjä on jo olemassa.';
    }
} catch(PDOException $e) {	echo 'Tietokantaerhe.';
    file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 1: '.$e->getMessage()."\n", FILE_APPEND);
}?>
