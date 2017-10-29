
"use strict";
//query selector ensimmäisen joka sääntöön sopii
//const testi = document.querySelector('#testi');  // # kuten css:ssä
//console.log(testi);
//testi.innerHTML = 'Klikkaa tästä'; //muokataan sisäistä htmllää

//testi.onclick = function() {  // linkistä tulee alert teksti
  //  alert('hei vaan');
//}

//lisätään tapahtumankuuntelija, mitä tapahtumaa halutaan kuunnella. esim klick
//kun funktio on tapahtumankäsittleijä, sille ei laiteta sulkeita, se tarkoittaisi että ajetaan heti
//testi.addEventListener('click', piilotaElementti);
//luodaan funktio
//const piilotaElementti = (evt) ==> {
 //   testi.setAttribute('class', 'hidden');
    
//}
                                           //muokataan attribuutteja, nyt luokkaa
                                            //metropolialinkki häviää

//querySelecrotAll valitsee kaikki, kaksi kenttää joissa molemmissa p-elementti
//const esimKappaleet = document.querySelectorAll('.esim');
//console.log(esimKappaleet); //kyseessä taulukko koska hakasulut näkyvät consolessa

//esimKappaleet[0].innerHTML = 'Eka kappale'; //valitaan taulukosta tietyt osat p.esim
//esimKappaleet[1].innerHTML = 'Toka kappale';

//!!!TEHTÄVÄ B!!!

let lomakeOK = '';

const checkAttribute = (attr, elements, func) => {
    elements.forEach((el) => {
    if (el.hasAttribute(attr)) {         //katsotaan onko kyseinen elementti required ja tällaiset lähetetään consoleen.
      func(el);
    }                                   //käydään taulukko läpi for eachin kanssa//kutsutaan funktiota check attribut//yksittäinen input-elementti näkyy nimellä "el"
    });
};

const checkEmpty = (el) => {
    colsole.log(el.value);
    if(el.value === '') {
      el.setAttribute('style', 'border: 1px solid red');   //pakolliset punaiseks
      lomakeOK += '0';   //
    } else {
      el.setAttribute('style', '');
      lomakeOK += '1';
    }  //tyyli checkEmpty-elementille
};

const inputElementit = document.querySelectorAll('input');


const lomake = document.querySelector('form');

lomake.addEventListener('submit', (evt) => {         //lomakken lähetykseen tarvitaan if-lause, tarkistaa onko lomake ok
  evt.preventDefault();//jos tarkistus ei mene läpi lomakkeen lähetys estetään
  lomakeOK = '';
  checkAttribute('required', inputElementit, checkEmpty);
    const lauseke = new RegExp('0');
    console.log(lauseke.exec(lomakeOK));//katsotaan löytyykö 0 jostakin eli  '/0/'
  if (!lauseke.exec(lomakeOK)) {   //exec suorittaa tarkastuksen löytyykö 0, ! = jos ei löydy 0, niin lähetetään
     lomake.submit();
  }
});                                                 //tapahtuman kuuntelu, ja kutsutaan tapahtuman käsittelijää
                                                //funktiota käytetään vain tässä tapauksessa, joten sitä ei ole pakko luoda erikseen. Eli () => {}

