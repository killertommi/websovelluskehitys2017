<?php
session_save_path('/home1-1/h/henripal/public_html/Elokuvaprojekti/session');
session_start();
/**
 * Created by PhpStorm.
 * User: henripal
 * Date: 27.11.2017
 * Time: 10.26
 */

//Lomakkeen syöttötiedot $data[] taulukossa
$data = $_POST['data'];
//Laitetaan syötetyt tiedot sessioon jemmaan, jotta voidaan palata muuttamaan annettuja arvoja
require_once ('upload.php');

$data['file'] = $target_file;

$_SESSION['lomakedata'] = serialize($data);

//Ovatko nimi ja email oikein? Nyt tarkistus palvelimella
if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {  //valmis php funktio
    if(preg_match("/^[a-öA-Ö ]*$/",$data['sukunimi'])) { //Sallitaan kirjaimia ja välilyöntejä
        //* on “useita”   ^  on “täytyy alkaa”
        echo '<div class="tiedot">';
        echo 'Nimi: '.$data['etunimi'].' '.$data['sukunimi'];
        echo '<br>';
        echo 'Sähköposti: '.$data['email'];
        echo '</div>';
        echo '<a href="saveUser.php" class="button sininen">Tallenna</a>';
        echo '<br>';
    }else {
        echo("<h3>VAIN KIRJAIMIA JA VÄLILYÖNTEJÄ HYVÄKSYTÄÄN SUKUNIMESSÄ: <br />"
            .$data['sukunimi'] ."</h3>");
    }
}else{
    echo("<h3>LAITON SÄHKÖPOSTIOSOITE: <br />"
        .$data['email']."</h3>");
}
echo '<a href="register.php" class="button punainen">Takaisin</a>';
?>
