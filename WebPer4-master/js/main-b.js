'use strict';

// Tee funktio 'showImages', joka
// lataa kuvat.json tiedoston, joka sisältää näytettävät kuvat taulukkona

// tee silmukka joka lisää merkkijonoon (string) jokaisesta kuvasta alla olevan HTML:n
/*
`<li>
    <figure>
        <a href="img/original/filename.jpg"><img src="img/thumbs/filename.jpg"></a>
        <figcaption>
            <h3>Title</h3>
        </figcaption>
    </figure>
</li>`
*/
// Silmukan jälkeen tulosta HTML-koodi (output) <ul>-elementin sisälle innerHTML:n avulla

//tätäkin voi käyttää
/*
const showImages = () => {
  fetch('kuvat.json').then((response) => {
    return response.json();
  }).then((json) => {
    console.log(json);
    let html = '';
    json.forEach((kuva) => {
      html += `<li>
                  <figure>
                      <a href="img/original/${kuva.mediaUrl}"><img src="img/thumbs/${kuva.mediaThumb}"></a>
                      <figcaption>
                          <h3>${kuva.mediaTitle}</h3>
                      </figcaption>
                  </figure>
              </li>`;
    });
    const ul = document.querySelector('ul');
    ul.innerHTML = html;
  });
};

showImages();
*/
//hakee kuvat sivulle
// sama tehtynä funktiolla jossa ei ole kovakoodausta, kumpaa tahansa voi käyttää

const suljeNappi = document.querySelector('.closeBtn'); //valitaan suljinnappi
const modal = document.querySelector('#modal');

const loadJSON = (url, func) => {
  fetch(url).then((response) => {
    return response.json();
  }).then((json) => {
    func(json);
  });
};


const linkkiTapahtumat = () => {
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
    });
  });
};


const templateFunction = (json) => {
  let html = '';
  json.forEach((kuva) => {
    html += `<li>
            <figure>
                <a href="img/original/${kuva.mediaUrl}"><img src="img/thumbs/${kuva.mediaThumb}"></a>
                <figcaption>
                    <h3>${kuva.mediaTitle}</h3>
                </figcaption>
            </figure>
        </li>`;
  });
  const element = document.querySelector('ul');
  element.innerHTML = html;
  // linkit voi valita vasta tämän jälkeen, eli html on nyt valmis
  linkkiTapahtumat();
};

loadJSON('kuvat.json', templateFunction);

suljeNappi.addEventListener('click', (evt) => {
  evt.preventDefault();
  // vaihda modalin luokka lightboxista hiddeniin
  modal.classList.replace('lightbox', 'hidden');
});











