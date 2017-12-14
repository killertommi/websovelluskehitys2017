'use strict';
// Get the modal
const modals = document.querySelectorAll('.modal');

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', (event) => {
  modals.forEach( (modal) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });

});
