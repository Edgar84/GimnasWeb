<?php
    require 'connexio.php';
    session_start();

    if (isset($_SESSION['usuari'])) {
        $dni = $_SESSION['dni'];
    }

    $id = $_GET["id"];
    $tipo = $_GET["tipo"];

    ////////////// RESERVA COLECTIVA ///////////////
    $sql = "CALL consultar_persones('" . $tipo ."','" . $dni . "')";
    //$sql = "SELECT d.id FROM client a, reserva_colectiva b, activitat c, activitat_colectiva d WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.data > curdate()AND b.anulada is null AND a.dni ='" . $dni . "'";
    $result = con()->query($sql);

    if($row = $result->fetch_assoc()){
        echo json_encode('hola');
        // if (empty($row['id'])){
        //     //ferReserva($dni);
        //     echo json_encode('hola');
        // }else{
        //     echo 'no pots';
        // }
        // echo 'el id: ' . $row['id'], "\n";
        // echo $tipo;
    }else{
        echo json_encode('hola');
    }

    function ferReserva($dni){
        $sql = "SELECT * FROM client WHERE client.dni =" . $dni . "'";
        $result = con()->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo json_encode('Activitat Lliure:' . $row['dni'] . ' NOM: ' . $row['nom']);
        }  

    }


?>