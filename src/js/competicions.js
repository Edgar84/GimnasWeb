/*** Competicions ***/
document.addEventListener('DOMContentLoaded', function(){
    consulta();
    crearBoto();
});

function crearBoto() {
    // Agafem tots els botons de "reserva"
    let buttons = document.querySelectorAll('.card-section_competicio .btn');

    // Els recorrem un per un fins que es faci click sobre algún d'ells
    buttons.forEach(button => {

        button.innerText = "Apuntar-se";
        // button.addEventListener('click', ()=>{
        //     console.log('reservat');
        // });
    });
}

function consulta() {
    const id = "";
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','prova.php',true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            xhttp.onload = function() {
                const user = JSON.parse(xhttp.responseText);
                const myArray = user.split(".");
                let dni = myArray[0];
                let usuari = myArray[1];
        
                console.log(dni);
                console.log(usuari);
                if (user != "No user") {
                    insertarUsuariHeader(usuari);
                } else {
                    mantenirHeader();
                }
            }
            
        }
    }
}


function insertarUsuariHeader(usuari) {
    const user = `<a class="nav-link" href="fitxa.php"><i class="fa fa-user" aria-hidden="true"></i> ${usuari}</a>`;
    document.querySelector(".user-header").innerHTML = user;
}

function mantenirHeader() {
    document.querySelector(".sortir").remove();
}


    
