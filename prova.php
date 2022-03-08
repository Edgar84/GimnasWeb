<?php 
    session_start();
    $user;

    if (isset($_SESSION['usuari'])) {
        $dni = $_SESSION['dni'];
        $usuari = $_SESSION['usuari'];

        $user = $dni .'.'.$usuari;
        echo json_encode($user);
    } else {
        $user = "No user";
        echo json_encode($user);
    }

?>