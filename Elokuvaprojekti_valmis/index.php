
<?php
session_save_path('/home1-1/h/henripal/public_html/Elokuvaprojekti/session');
session_start();
require_once("php/config.php");//YHTEYDEN MUODOSTUS TIETOKANTAAN
include("php/functions.php");
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MOVIE REVIEWS - web projekti 2017</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<div class="header">   <!--SIVUN YLÄOSA-->

<div class="testiarea">  <!--BUTTONIT JA KÄYTTÄJÄTIEDOT 60EM ALUEEN SISÄLLÄ-->
    <h1>MOVIE REVIEWS</h1>
    <p class="ylasivuparagraph">Search, comment, score and read about your favorite movies</p>

    <!--KÄYTTÄJÄTIEDOT-->
    <?php
    if($_SESSION['kirjautunut'] == 'yes') {
        //Ladataan tämä (käyttäjän tiedot
        ?>
        <?php
        echo '<div class="tiedot">';
        echo '<span style="color:green">'. 'Welcome!' . '</span>';
        echo '<br>';
        echo '<b>'.'Name:'.'</b> ' . $_SESSION['etunimi'] . ' ' . $_SESSION['sukunimi'] . ' ';
        echo '<br>';
        echo ' '. '<b>' . 'Email: '. '</b>' . $_SESSION['email'];
        echo '<br>';
        echo '<img style="width:100px; height:100px;" src="' .$_SESSION['profiilikuva'].'">';
        echo '<br>';
        echo '</div>';
        echo('<a href="logout.php" class="buttonpunainen">Log out</a>');
    }
    ?>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">  <!--LOG IN MODAL-->

        <form class="modal-content animate" action="login.php" method="post">

            <div method="post">
                <input type="email" name="email" placeholder="Email address" required><span> * </span>
                <input type="password" name="pwd" placeholder="Password" required><span> * </span>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <input type="submit" id="loginbtn" value="Log in">
            </div>
        </form>
    </div>

    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="regbtn">Register</button>


    <div id="id02" class="modal">  <!--REGISTER MODAL-->

        <form class="modal-content animate" action="confirm.php" method="post" enctype="multipart/form-data">

            <div method="post">
                <input type="text" name="data[etunimi]" placeholder="First name" required><span> * </span>
                <input type="text" name="data[sukunimi]" placeholder="Last name" required><span> * </span>
                <input type="email" name="data[email]" placeholder="Email address" required><span> * </span>
                <input type="password" name="data[pwd]" placeholder="Password" required><span> * </span>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <input type="submit" name="submit" id="savebtn" value="Create user" >
            </div>
        </form>
    </div>
</div>
</div>


<main class="primary-color">  <!--ELOKUVAT JA TIEDOT PÄÄSIVULLA TIETOKANNASTA-->
    <ul>
    <!--TIETOKANNASTA HAETAAN ELOKUVIEN THUMBKUVAT JA TIEDOT NÄKYVIIN-->
    </ul>
</main>

<!-- MODAL: ALUKSI SISÄLTÖ HIDDEN -->
<div id="modal" class="hidden">  <!--modalin tapainen aukeaa samalle sivulle huom class hidden-->
    <a href="#" class="closeBtn">x</a>

    <img > <!--ISO KUVA HAETAAN TÄHÄN MODALIIN TIETOKANNASTA-->
    <form id="palautelomake" action="php/haeArvostelut.php" method="get" enctype="multipart/form-data"> <!--action="haeArvostelut.php": haetaan datat ja lisätään tietokantaan-->
        <!--<p>Nickname:</p>
        <input style="width:40%;" type="text" name="nimi" required/> <!--käyttäjänimi-->
        <p class="kaikkiarvostelut">Score:</p>
        <input class="radionappi1" type="radio" name="arvosana" value="1"> 1 <!--arvosanan radiobuttonit-->
        <input class="radionappi2" type="radio" name="arvosana" value="2"> 2
        <input class="radionappi3" type="radio" name="arvosana" value="3"> 3
        <input class="radionappi4" type="radio" name="arvosana" value="4"> 4
        <input class="radionappi5" type="radio" name="arvosana" value="5"> 5
        <input type="hidden" name="filmID" value="1" id="elokuvaID">  <!--elokuvan id valueksi-->
        <p class="kaikkiarvostelut">Write your review:</p>
        <textarea class="arvosteluteksti" type="text" name="palaute" required></textarea> <!--käyttäjän kirjoittama arvostelu-->
        <br><br>
        <input class="kommenttinappi" type="submit" name="send" value="Add review"/>
    </form>
    <hr>
    <h2 class="kaikkiarvostelut">All reviews</h2>
    <!--KAIKKI ELOKUVAN ARVOSTELUT-->

    <?php
    require_once ('php/haeArvostelut.php');  //lisää lähetetyn arvostelun tiedot tietokjantaan
    //require_once ('php/haeKommentit.php');
    ?>

    <div class="lahetettypalaute">

    </div>
</div>

<!--LINKIT JS-TIEDOSTOIHIN-->
<script src="js/main-b.js"></script>
<script src="js/main.js"></script>

</body>
</html>