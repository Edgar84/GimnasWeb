<?php
    require 'connexio.php';

    function iniciarSessio() {
        if (isset($_POST['submit'])) {
            $user = $_POST['usuari'];
            $passwd = ($_POST['password']);
            $correcte = '';

            $sql = "SELECT * FROM client WHERE usuari = '" . $_POST['usuari'] ."' AND contrasenya = '" . md5($_POST['password']) . "'";
            $result = con()->query($sql);

            if ($result->num_rows > 0) {
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
                        header("Location: index.php");
                }
            }
            else {
                $_SESSION['error'] = "Usuari o contrasenya incorrectes";
                    
            }     
        }
    }

    function infoActivitatsLliures() {
        $sql = "SELECT a.id, a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, b.data, c.num, c.aforament_max, d.nom, d.cognom, a.color
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
        $sql = "SELECT a.id, a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, b.data, c.num, c.aforament_max, d.nom, d.cognom, a.color
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
                contrasenya = '" . sha1($_POST['password']) . "',
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

    function obtenirReservesLliuresPendents() {
        $sql = "SELECT a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, c.num, c.aforament_max, d.nom, d.cognom, a.color
                FROM activitat a, es_fa b, sala c, monitor d, reserva_lliure e, `client` f
                WHERE a.id = e.id AND
                a.id = b.id AND
                b.num = c.num AND
                d.num = c.num AND
                b.data > curdate() AND
                e.anulada = 0 AND
                e.dni = '" . $_SESSION['dni'] . "' AND
                a.id IN
                    (SELECT *
                    FROM activitat_lliure)";
        $result = con()->query($sql);
        return $result;
    }

    function obtenirReservesColectivesPendents() {
        $sql = "SELECT a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, c.num, c.aforament_max, d.nom, d.cognom, a.color
                FROM activitat a, es_fa b, sala c, monitor d, reserva_colectiva e, `client` f
                WHERE a.id = e.id AND
                a.id = b.id AND
                b.num = c.num AND
                d.num = c.num AND
                b.data > curdate() AND
                e.anulada = 0 AND
                e.dni = '" . $_SESSION['dni'] . "' AND
                a.id IN
                    (SELECT *
                    FROM activitat_colectiva)";
        $result = con()->query($sql);
        return $result;
    }

    function obtenirReservesLliuresFinalitzades() {
        $sql = "SELECT a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, c.num, c.aforament_max, d.nom, d.cognom, a.color
                FROM activitat a, es_fa b, sala c, monitor d, reserva_lliure e, `client` f
                WHERE a.id = e.id AND
                a.id = b.id AND
                b.num = c.num AND
                d.num = c.num AND
                b.data < curdate() AND
                e.anulada = 0 AND
                e.dni = '" . $_SESSION['dni'] . "' AND
                a.id IN
                    (SELECT *
                    FROM activitat_lliure)";
        $result = con()->query($sql);
        return $result;
    }

    function obtenirReservesColectivesFinalitzades() {
        $sql = "SELECT a.nom AS activitat, TIME_FORMAT(b.hora, '%H:%i') AS hora, c.num, c.aforament_max, d.nom, d.cognom, a.color
                FROM activitat a, es_fa b, sala c, monitor d, reserva_colectiva e, `client` f
                WHERE a.id = e.id AND
                a.id = b.id AND
                b.num = c.num AND
                d.num = c.num AND
                b.data < curdate() AND
                e.anulada = 0 AND
                e.dni = '" . $_SESSION['dni'] . "' AND
                a.id IN
                    (SELECT *
                    FROM activitat_colectiva)";
        $result = con()->query($sql);
        return $result;
    }

?>