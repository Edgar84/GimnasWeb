<?php
    function con() {
        $con = new mysqli('localhost', 'root', 'root', 'gimnas');

        if ($con->connect_errno) {
            die("Ha hagut un problema de connexio");
        }
        return $con;
    }

    function iniciarSessio() {
        if (isset($_POST['submit'])) {
            $user = $_POST['usuari'];
            $passwd = $_POST['password'];
            $correcte = '';

            $sql = "SELECT * FROM client WHERE usuari = '" . $_POST['usuari'] ."' AND contrasenya = '" . $_POST['password'] . "'";
            $result = con()->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($user == $row['usuari']) {
                        if ($passwd == $row['contrasenya']) {
                            $correcte = 'Correcte'; 
                        }   
                    }
                    if ($correcte == 'Correcte') {
                        $_SESSION['nom'] = $row['nom'];
                        $_SESSION['cognom'] = $row['cognom'];
                        $_SESSION['usuari'] = $_POST['usuari'];
                        header('Location: index.php');
                    }
                }
            }
            else {
                $_SESSION['error'] = "Usuari o contrasenya incorrectes";
                
            }     
        }
    }

    function dadesUsuari() {
        if (isset($_SESSION['usuari'])) {
        $sql = "SELECT * FROM client WHERE usuari = '" . $_SESSION['usuari'] . "';";
        $result = con()->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            $_SESSION[$row['dni']] = $row['dni'];
        }
        }
    }

    function sessioJaIniciada() {
        if (!empty($_SESSION['usuari'])) {
            header('Location: contingut.php');
        }
    }
?>