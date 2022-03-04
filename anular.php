<?php
    //Mostrar errors
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);

    require 'connexio.php';
    session_start();

    if (isset($_SESSION['usuari'])) {
        $dni = $_SESSION['dni'];
    }

    $id_act = $_GET["id_act"];
    $id_act = $_GET["tipo"];
    

    $sql = "UPDATE reserva_colectiva SET anulada = 1 WHERE id_act =".id_act." AND dni =".$dni"
    SET sueldo_bruto = '50000',
    prima_objetivos = '3000'
    WHERE sueldo_bruto < 45000 AND sueldo_bruto > 40000
    ORDER BY antiguedad DESC LIMIT 50";

    $result = con()->query($sql);

    if($result && mysqli_num_rows($result)==0){
        
    }


?>