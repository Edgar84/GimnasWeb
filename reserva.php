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

    $tipo = $_GET["tipo"];
    $id_act = $_GET["id"];
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    

    $sql = "CALL consultar_persones('" . $tipo ."','" . $data . "','". $hora . "','" . $dni . "'," . $id_act . ")";

    $result = con()->query($sql);

    if($result && mysqli_num_rows($result)==0){
        echo 'Si pots';
    }


?>