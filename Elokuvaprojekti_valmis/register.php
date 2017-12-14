<?php
session_save_path('/home1-1/h/henripal/public_html/Elokuvaprojekti/session');
session_start();
?>
Tähdellä merkityt kentät ovat pakollisia.
<br>
<form action="confirm.php" method="post" enctype="multipart/form-data">
    <?php
    //Halutaanko vaihtaa käyttäjätietoja - loggautunut käyttäjä
    //Käyttäjätiedot syöttövaiheessa assosiatiiviseen taulukkoon data[]  eli elementin indeksi on nimi

    if(isset($_SESSION['lomakedata'])){  //Ollaanko muuttamassa käyttäjätietoja eli on  kirjautunut käyttäjä
        $lomakedata = unserialize($_SESSION['lomakedata']);
        ?>
        <input type="text" name="data[etunimi]" value="<?php echo $lomakedata['etunimi']; ?>" required><span>*</span>
        <br>
        <input type="text" name="data[sukunimi]" value="<?php echo $lomakedata['sukunimi']; ?>" required><span>*</span>
        <br>
        <?php
    }else{ //Luodaan uudet käyttäjätunnukset
        ?>
        <input type="text" name="data[etunimi]" placeholder="Etunimi" required><span>*</span>
        <br>
        <input type="text" name="data[sukunimi]" placeholder="Sukunimi" required><span>*</span>
        <br>
        <input type="email" name="data[email]" placeholder="Sähköposti" required><span>*</span>
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <?php
    }
    ?>
    <br>
    <input type="password" name="data[pwd]" placeholder="Salasana" required><span>*</span>
    <br>

    <input type="submit" value="Tallenna">
</form>

<script>
  const salasana = document.querySelector('input[name="givenPw"]');
  const varmistus = document.querySelector('input[name="givenPwAgain"]');
  const fillPattern = function(){
    varmistus.pattern = this.value;
  };
  salasana.addEventListener('keyup', fillPattern);
</script>
