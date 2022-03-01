/*** Competicions ***/

// Agafem tots els botons de "reserva"
let buttons = document.querySelectorAll('.card-section_competicio .btn');

// Els recorrem un per un fins que es faci click sobre algún d'ells
buttons.forEach(button => {
    button.addEventListener('click', ()=>{
        console.log('reservat');
    });
});
