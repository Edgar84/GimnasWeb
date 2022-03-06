
const buttonsReserva = document.querySelectorAll('.btn-reserva');

buttonsReserva.forEach(btn => {
    btn.addEventListener('click', function(){
        const id_act = btn.getAttribute('id');
        const tipo = btn.parentElement.parentElement.parentElement.parentElement.previousElementSibling.innerText.toString().toLowerCase().replace('activitats ','').replace('l·l', 'l');
        const data = btn.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.innerText;
        const hora = btn.previousElementSibling.firstElementChild.nextElementSibling.innerText.slice(0, -1) + ":00";

        if(btn.innerText == "Anular"){
            anularReserva(tipo, data, hora, id_act, btn);
        }else{
            if(comprovarData(btn)){
                reservar(id_act, tipo, data, hora, btn);
            }else{
                noPotsReservar(btn, false);
            }
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

function reservar(id_act,tipo,data,hora,btn) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','reserva.php?id='+id_act+'&tipo='+tipo+'&data='+data+'&hora='+hora,true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this,this.readyState == 4 && this.status == 200){
            let result = this.response;
            if(result == ''){
                noPotsReservar(btn,true);
                console.log('Resposta' + result);
                console.log('no pots');
            }else if(result == 'Si pots'){
                reservaFeta(btn);
            }
        }
    }
}

function anularReserva(tipo, data, hora, id_act, btn) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','anular.php?tipo='+tipo+'&data='+data+"&hora="+hora+"&id_act="+id_act,true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this,this.readyState == 4 && this.status == 200){
            let result = this.response;
            console.log(result);
            btn.className = 'btn btn-primary btn-reserva';
            btn.innerText = 'Reservar';
        }
    }
}

function noPotsReservar(btn,elem){
    let errorMessage = document.createElement("span");
    errorMessage.className = 'style_reserva noReservaHora';
    if(elem == true){
        errorMessage.innerText = "Ja tens una reserva d'aquest tipus feta";
    }else{
        errorMessage.innerText = "Momés pots reservar 60 minuts abans de l'inici de l'activitat";
    }
    const caixa = btn.parentElement;
    caixa.appendChild(errorMessage);
    borrarMissatge();
}

function reservaFeta(btn){
    let okMessage = document.createElement("span");
    okMessage.className = 'style_reserva reservaFeta';
    okMessage.innerText = "Reserva feta satisfactoriament";
    let caixa = btn.parentElement;
    caixa.appendChild(okMessage);
    borrarMissatge();
    btn.innerText = 'Anular';
    btn.className = 'btn btn-warning';
}

function borrarMissatge(){
    setTimeout(function(){
        document.querySelector('.style_reserva').remove();
    },3000);
}

function anularBotons() {

}





