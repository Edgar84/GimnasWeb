/*** Competicions ***/
document.addEventListener('DOMContentLoaded', function(){
    consulta();
    crearBoto();
});

function crearBoto() {
    let buttons = document.querySelectorAll('.card-section_competicio .btn');
    buttons.forEach(button => {
        button.innerText = "Apuntar-se";
        button.addEventListener('click', ()=>{
            let nom = button.closest('.card-body').firstElementChild.innerText;
            reservar(nom);
        });
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
        
                if (user != "No user") {
                    insertarUsuariHeader(usuari);
                } else {
                    mantenirHeader();
                }
            }
            
        }
    }
}

function reservar(nom){
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


    
