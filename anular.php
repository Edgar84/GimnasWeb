<?php
    //Mostrar errors
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require 'connexio.php';
    session_start();

    if (isset($_SESSION['usuari'])) {
        $dni = $_SESSION['dni'];
    }

    $tipo = $_GET["tipo"];
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    $id_act = $_GET["id_act"];
    
    
    
    
    $sql = "CALL anular_reserva('" . $tipo . "','" . $data . "', '" . $hora . "', '" . $dni . "', " . $id_act . ");";

    $result = con()->query($sql);

    if ($result){
        $afectados = mysqli_affected_rows(con());
        echo "Cantidad de filas afectadas: ".$afectados;
    }


?>