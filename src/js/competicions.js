/*** Competicions ***/
document.addEventListener('DOMContentLoaded', function(){
    consulta();
    crearBoto();
});

function crearBoto() {
    let buttons = document.querySelectorAll('.card-section_competicio .btn');
    let count = 0;
    buttons.forEach(button => {
        count++;
        button.innerText = "Apuntar-se";
        button.setAttribute('id',count);
        button.addEventListener('click', ()=>{
            let nom = button.closest('.card-body').firstElementChild.innerText;
            let data = button.closest('.card-body').closest('.card-body').firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.innerText;
            const id = button.getAttribute('id');
            reservar(nom,data,id);
            reservatCompeti(button);
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

function reservar(nom,data,id){
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','reserva-competicio.php?nom='+nom+'&data='+data+'&id='+id,true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this,this.readyState == 4 && this.status == 200){
                let result = this.response;
                    console.log('Resposta' + result);
                    console.log('no pots');
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

function reservatCompeti(button) {
    button.className = "btn btn-info disabled";
    button.innerText = "Apuntat!";
    button.style = "pointer-events:none;";
}

    
