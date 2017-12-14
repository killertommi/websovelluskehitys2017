
<?php
//elokuvan tietojen haku tietokannasta
$sql="SELECT nimi, vuosi, kuvaus, mediaUrl, mediaThumb FROM Elokuva ORDER BY ElokuvaID";

//echo($sql); //Testi, miltä lause näyttää - lainausmerkit kohdallaan?
echo("</br>");
$omakysely = $DBH->prepare($sql);

$omakysely->execute();

try{  //elokuvan tietojen jäsentely pääsivulle
    while ($rivi = $omakysely->fetch()) {
        echo "</br>". "<div class='kuvalaatikko'>" . "<h3> " . $rivi["nimi"] . "  " . $rivi["vuosi"] . "</h3> " .
            " </br> ". $rivi["kuvaus"] . $rivi["mediaThumb"] . "<ul></ul> " . "</div>";
    }

} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}




