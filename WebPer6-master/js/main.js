//kuvan zoomaus canvas elementillä

//elementtien valinta ja olioiden luonti
const inputElement = document.querySelector('input');
const zoom = document.querySelector('#zoom');
const leftRight = document.querySelector('#leftRight');
const upDown = document.querySelector('#upDown');

const img = document.createElement('img');

const canvas = document.querySelector('canvas');
const ctx = canvas.getContext("2d");

const reader = new FileReader();

//muuttujat koordinaatteja varten
let x = 0;
let y = 0;   //alkuarvot
let originalWidth = canvas.width;
let originalHeight = canvas.height;
let width = 0;
let height = 0;

//tapahtuman kuuntelijat
inputElement.addEventListener('change', (evt) => {  //input elementille
    const file = inputElement.files[0];
    reader.readAsDataURL(file);
});

reader.addEventListener('load', (evt) => {
    img.src = reader.result;    //readerille
});

img.addEventListener('load', (evt) => {
    console.log(img.height);
    console.log(img.width);
    originalWidth = originalHeight * img.width / img.height;
    ctx.drawImage(img, 0, 0, originalWidth, originalHeight);
});

zoom.addEventListener('input', (evt) => {
    width = originalWidth * zoom.value;
    height = originalHeight * zoom.value;
    redraw();    //piirrä uudelleen
});

leftRight.addEventListener('input', (evt) => {
    x = leftRight.value;
    redraw();     //vaakasuunta vipu
});

upDown.addEventListener('input', (evt) => {
    y = upDown.value;
    redraw();   //pystysuunta vipu
});

//kutsutaan kun säätimiä (range) muutetaan  .. functio
const redraw = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(img, x, y, width, height);
};




