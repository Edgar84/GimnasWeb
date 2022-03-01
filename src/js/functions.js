if(document.querySelectorAll('.btn-reserva')){
    const buttonsReserva = document.querySelectorAll('.btn-reserva');
    buttonsReserva.forEach(btn => {
        btn.addEventListener('click', function(){
            reservar();
        });
    });
}

function reservar() {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET','reserva.php',true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this,this.readyState == 4 && this.status == 200){
            let result = this.response;
            console.log(result);
        }
    }
}





