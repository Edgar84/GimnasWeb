<?php
    function con() {
        $con = new mysqli('localhost', 'root', 'root', 'gimnas');
        // $con = new mysqli('localhost', 'root', 'root', 'db_gimnas', '3307');

        if ($con->connect_errno) {
            die("Ha hagut un problema de connexio");
        }
        return $con;
    }

?>