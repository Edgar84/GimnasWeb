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
                        $_SESSION['usuari'] = $row['usuari'];
                        header("Location: index.php");
                    }
                }
            }
            else {
                $_SESSION['error'] = "Usuari o contrasenya incorrectes";
                    
            }     
        }
    }

    function obtenirDadesUsuari() {
        if (isset($_SESSION['usuari'])) {
        $sql = "SELECT * FROM client a, es_dona b WHERE a.usuari = '" . $_SESSION['usuari'] . "'AND a.dni = b.dni AND b.data_baixa IS null";
        $result = con()->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            $_SESSION['dni'] = $row['dni'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['cognom'] = $row['cognom'];
            $_SESSION['telefon'] = $row['telefon'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['sexe'] = $row['sexe'];
            $_SESSION['data_naix'] = $row['data_neixement'];
            $_SESSION['usuari'] = $row['usuari'];
            $_SESSION['compte_bancari'] = $row['compte_bancari'];
            $_SESSION['condicio'] = $row['condicio'];
            $_SESSION['com_comercial'] = $row['comunicacio_comercial'];
            $_SESSION['data_alta'] = $row['data_alta'];
        }
        }
    }


    function infoActivitatsLliures() {
        $sql = "SELECT a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, c.num, c.aforament_max, d.nom, d.cognom
                FROM activitat a, es_fa b, sala c, monitor d
                WHERE a.id = b.id AND
                b.num = c.num AND
                d.num = c.num AND
                a.id IN
                    (SELECT *
                    FROM activitat_lliure)";
        $result = con()->query($sql);
        return $result;
    }

    function infoActivitatsColectives() {
        $sql = "SELECT a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, c.num, c.aforament_max, d.nom, d.cognom
                FROM activitat a, es_fa b, sala c, monitor d
                WHERE a.id = b.id AND
                b.num = c.num AND
                d.num = c.num AND
                a.id IN
                    (SELECT *
                    FROM activitat_colectiva);";
        $result = con()->query($sql);
        return $result;
    }

    function modificarDadesClient() {
        $_SESSION['success'] = '';
        if (!empty($_POST)) {
            if ($_POST['password'] == $_POST['passwordConf'] && (!empty($_POST['password']) && !empty($_POST['passwordConf']))) {
                $sql = "UPDATE client SET telefon = '" . $_POST['tel'] . "',
                email = '" . $_POST['email'] . "',
                usuari = '" . $_POST['user'] . "',
                contrasenya = '" . $_POST['password'] . "',
                comunicacio_comercial = '" . $_POST['info'] . "' 
                WHERE dni = '" . $_SESSION['dni'] . "'";
                $result = con()->query($sql);

                $_SESSION['success'] = "S'han modificat les dades correctament";
                
            } elseif (empty($_POST['password']) && empty($_POST['passwordConf'])) {
                $sql = "UPDATE client SET telefon = '" . $_POST['tel'] . "',
                email = '" . $_POST['email'] . "',
                usuari = '" . $_POST['user'] . "',
                comunicacio_comercial = '" . $_POST['info'] . "' 
                WHERE dni = '" . $_SESSION['dni'] . "'";
                $result = con()->query($sql);
                $_SESSION['success'] = "S'han modificat les dades correctament";
            } else {
                $_SESSION['error'] = "Les contrasenyes introduïdes han de ser iguals";
            }
        }
    }

?>