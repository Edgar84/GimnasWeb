
const buttonsReserva = document.querySelectorAll('.btn-reserva');

buttonsReserva.forEach(btn => {
    btn.addEventListener('click', function(){
        const id = btn.getAttribute('id');
        if(comprovarData(btn)){
            const tipo = btn.parentElement.parentElement.parentElement.parentElement.previousElementSibling.innerText.toString().toLowerCase().replace('activitats ','').replace('l·l', 'l');
            if(tipo == 'colectives'){
                reservarColectiva(id,tipo.toLowerCase());
            }else if(tipo == 'lliures'){
                reservarLliure(id,tipo.toLowerCase());
            }
            
        }else{
            noPotsReservar(btn);
        }
        
    });
});

function comprovarData(btn){
    //Agafem de la data de l'activitat en un array i agafem l'hora de l'activitat
    let dataActivitat = btn.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.innerText.split("-");
    let horaActivitat = btn.previousElementSibling.firstElementChild.nextElementSibling.innerText;
    //Asignem a una variable per l'any,el mes i el dia de la data de l'activitat
    var anyActivitat = parseInt(dataActivitat[0]);
    var mesActivitat = parseInt(dataActivitat[1]);
    var diaActivitat = parseInt(dataActivitat[2]);
    //Creem un objecte data i extreiem l'any, mes, dia, hora i minuts
    const dt = new Date();
    var anyAvui = dt.getFullYear();
    var mesAvui = dt.getMonth() + 1;
    var diaAvui = dt.getDate();
    var horaAvui = dt.getHours();
    var minutAvui = dt.getMinutes();
    //Comprobem si la data de l'activitat es més gran o igual que la data d'avui
    if( (anyActivitat >= anyAvui && mesActivitat > mesAvui) || (anyActivitat >= anyAvui && mesActivitat == mesAvui && diaActivitat >= diaAvui) ){
        //Contem els minuts totals de la hora de l'activitat i els minuts totals del dia d'avui
        const minTotalActivitat = (parseInt(horaActivitat.split(":")[0] * 60) + (parseInt(horaActivitat.split(":")[1])));
        const minTotalAvui = (horaAvui * 60) + (minutAvui);
        //Si el dia de l'activitat es mes tard que el dia d'avui o el dia de l'activitat es avui i la resta dels minuts totals es inferior o igual a 60, podrá fer la reserva
        if( ((minTotalActivitat - minTotalAvui >= 60) && (diaActivitat == diaAvui)) || diaActivitat > diaAvui || mesActivitat > mesAvui){
            return true;
        }else{
            return false;
        }
    }
    return false;
}

function reservarColectiva(id,tipo) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','reserva_colectiva.php?id='+id+'&tipo='+tipo,true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this,this.readyState == 4 && this.status == 200){
            let result = this.response;
            //if(this.response == 'hola'){
            //    alert('pots');
                console.log(result);
            //}else{
            //    alert('no pots');
            //    console.log(result);
            //}
            
        }
    }
}

function reservarLliure(id,tipo) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','reserva_lliure.php?id='+id+'&tipo='+tipo,true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this,this.readyState == 4 && this.status == 200){
            let result = this.response;
            console.log(result);
        }
    }
}

function noPotsReservar(elem){
    const errorMessage = document.createElement("span");
    errorMessage.className = 'noReservaHora';
    errorMessage.innerText = "Momés pots reservar 60 minuts abans de l'inici de l'activitat";
    const caixa = elem.parentElement;
    caixa.appendChild(errorMessage);
    borrarMissatge();
}

function borrarMissatge(){
    setTimeout(function(){
        document.querySelector('.noReservaHora').remove();
    },3000);
}






