'use strict';
/*
// tee funktio 'showImages', joka

const showImages = () => {
      fetch('kuvat.html').then((response) => {
        return response.text();
      }).then((text) => {
        console.log(text);
        // lisää ladatun HTML-sisällön <ul> elementin sisälle
        const ul = document.querySelector('ul');
        ul.innerHTML = text;
      });
    };

showImages();
*/

// sama tehtynä funktiolla jossa ei ole kovakoodausta

/*const loadHTML = (url, target) => {
  // url = osoite tiedostoon joka ladataan
  fetch(url).then((response) => {
    return response.text();
  }).then((text) => {
    console.log(text);
    // lisää ladatun sisällön target parametrillä määrätyn elementin sisälle
    const element = document.querySelector(target);
    element.innerHTML = text;
  });
};

loadHTML('kuvat.html', 'ul');*/

/*Tehtävä A

Avaa teht_a.html, main_a.js ja main.css editorissa
main.css sisältää valmiit luokat punainen, sininen ja vihrea
tee main_a.js:ään skripti, joka #lisaa nappia painamalla lisaa ensimmäiseen p-elementtiinluokan punainen
tee main_a.js:ään skripti, joka #vaihda nappia painamalla vaihtaa toisen p-elementin luokkaa
luokkien sininen ja punainen välillä
tee main_a.js:ään skripti, joka #toggle nappia painamalla vuorotellen lisää ja poistaa
kolmanteen p-elementtin luokkaa vihrea*/

const ekaP = document.querySelector('p'); //muokataan p-elementtiä
const tokaP = document.querySelector('p:nth-child(2)'); //muokataan p-elementtiä
const kolmasP = document.querySelector('p:nth-child(3)'); //muokataan p-elementtiä

const lisaa = document.querySelector('#lisaa');  //koska eka button id=lisaa
const vaihda= document.querySelector('#vaihda');
const toggle = document.querySelector('#toggle');

//muista nuolifunktiorakenne
lisaa.addEventListener('click', (evt) => {   //muokataan p-elementtiä
  ekaP.classList.add('punainen');  //lisätään esnimmäiselle paragraphille luokka 'punainen'
});

vaihda.addEventListener('click', (evt) => {
  if(tokaP.classList.contains('punainen')) {
    tokaP.classList.replace('punainen', 'sininen');
  }else {
    tokaP.classList.replace('sininen', 'punainen');
  }
});

toggle.addEventListener('click', (evt) => {
  kolmasP.classList.toggle('vihrea');
});



