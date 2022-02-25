<?php

    //Tanca la sessió.
    session_start();
    session_destroy();

    //Redirecciona a la pàgina de login.
    header('Location: index.php');

?>