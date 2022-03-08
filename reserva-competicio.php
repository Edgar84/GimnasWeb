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

    $nom = $_GET["nom"];
    $data = $_GET["data"];
    $id = $_GET["id"];
    
    
    
    $sql = "INSERT INTO inscriu VALUES ('". $data ."',". $id .",'" . $dni ."')";

    $result = con()->query($sql);

    if ($sql){
        $afectados = mysqli_affected_rows(con());
        //echo "afecatades: " . $afectados;
        echo " consulta: " . $sql;
    }


?>