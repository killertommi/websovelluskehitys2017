'use strict';

const suljeNappi = document.querySelector('.closeBtn'); //valitaan suljinnappi modalille
const modal = document.querySelector('#modal');

const loadJSON = (url, func) => {
  fetch(url).then((response) => {
    return response.json();
  }).then((json) => {
    func(json);
  });
};

const linkkiTapahtumat = () => {  //Modalin aukeaminen pääsivun elokuvalinkeistä
  const linkit = document.querySelectorAll('ul a');
  // käy forEachillä linkit läpi
  linkit.forEach((linkki) => {
    // lisää jokaiseen linkkiin click event
    linkki.addEventListener('click', (evt) => {
      evt.preventDefault();
      // klikatessa hae linkin href arvo ja laita se modalin img:n src arvoksi
      const href = linkki.getAttribute('href');
      const img = modal.querySelector('img');
      img.setAttribute('src', href);
      // vaihda modalin luokaksi lightbox hiddenin sijaan
      modal.classList.replace('hidden', 'lightbox');
      //modal.classList.add('animated', 'slideInDown'); animate.css
      // hae kommentit
      kommenttiFunktio(linkki.dataset.id)
    });
  });
};

const kommenttiFunktio = (id) => { //Kommentit haetaan tietyn elokuvan modaliin eloukvan id:n perusteella (kategoria)
  // kommentointiin filmID
  document.querySelector('#elokuvaID').value = id;
  fetch('php/haeKommentit.php?id='+id).then((response) => {
    return response.json();
  }).then((json) => {
    // näytä kommentit eli getataan kommentit
    console.log(json);
    kommenttiTemplate(json);
  });
};

const kommenttiTemplate = (json) => {
  let html = '';
  json.forEach((elokuva) => {  //jokaiselle elokuvalle kommenttikenttään tietokannasta
    html += `<table>
                <tr>
                    <td> <!--Käyttäjän etunimi-->
                      <span style='color:limegreen;font-size: 140%;'>User</br></span> <b>${elokuva.etunimi}</b>
                    </td>
                    <td><!--Elokuvan arvosana-->
                      <span style='color:orange;font-size: 140%;'>Score</br></span> ${elokuva.arvosana}
                    </td>
                    <td><!--Kirjoitettu arvostelu-->
                       ${elokuva.arvostelu}
                    </td>
                 </tr>
                </table>
                <br>
                </hr>`;
  });
  const element = document.querySelector('.lahetettypalaute');  //luokan sisälle tulee yllä oleva html-koodi
  element.innerHTML = html;
  // linkit voi valita vasta tämän jälkeen, eli html on nyt valmis
};

const templateFunction = (json) => {  //Tietokannasta haetaan tietylle elokuvalle: kuva, nimi ja vuosi pääsivulle
  let html = '';
  json.forEach((elokuva) => {
    html += `<li>
            <figure>              <!--data-id avulla voidaan hakea jonkin datan perusteella tietokannan tietyn osan tietoja-->
                <a class="elokuvalinkit" data-id="${elokuva.ElokuvaID}" href="img/original/${elokuva.mediaUrl}"><img src="img/thumbs/${elokuva.mediaThumb}">
                <h3>${elokuva.nimi}</h3>
                <h3 class="vuosiluku">(${elokuva.vuosi})</h3>
                <p>${elokuva.kuvaus}</p>
                <figcaption>
                <h3>Review</h3>
                </figcaption>
                </a>
            </figure>
        </li>`;
  });

  const element = document.querySelector('ul'); //mainin sisällä pääsivulla ul-elementin sisälle tuleva html
  element.innerHTML = html;
  // linkit voi valita vasta tämän jälkeen, eli html on nyt valmis
  linkkiTapahtumat();
};

loadJSON('php/haeElokuvat.php', templateFunction);      //Käsitellään saatu tulostus jsonilla
loadJSON('php/haeKommentit.php', kommenttiFunktio);

suljeNappi.addEventListener('click', (evt) => {
  evt.preventDefault();
  // vaihda modalin luokka lightboxista hiddeniin
  modal.classList.replace('lightbox', 'hidden');
});












