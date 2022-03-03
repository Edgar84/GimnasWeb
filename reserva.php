<?php
    require 'connexio.php';
    session_start();

    if (isset($_SESSION['usuari'])) {
        $dni = $_SESSION['dni'];
    }

    $id = $_GET["id"];
    $tipo = $_GET["tipo"];

    // $stmt = odbc_prepare($odbc, "CALL consultar_persones(?, ?)");
    // $result = odbc_execute($stmt, [$tipo, $dni]);

    //$sql = "CALL consultar_persones('" . $tipo ."','" . $dni . "')";
    // $sqlc = "";
    // $sqll = "";
    // switch($tipo){
    //     case 'COLECTIVES':
    //         $sqlc = "SELECT d.id FROM client a, reserva_colectiva b, activitat c, activitat_colectiva d WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.data > curdate() AND b.anulada is null AND a.dni ='" . $dni . "'";
    //         $result_col = con()->query($sqlc);
    //         if($row = $result_col->fetch_assoc()){
    //             echo 'el id: ' . $row['id'], "\n";
    //             //echo $tipo;
    //         }
    //         break;
    //     case 'LLIURES':
            $sql = "SELECT d.id FROM client a, reserva_lliure b, activitat c, activitat_lliure d WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.data > curdate() AND b.anulada is null AND a.dni ='" . $dni . "'";
            $result = con()->query($sql);
            if($row = $result->fetch_assoc()){
                echo 'el id: ' . $row['id'], "\n";
                echo $tipo;
            }
        //     }
        //     break;
        // }
    
    // $result_col = con()->query($sqlc);
    // $result_ll = con()->query($sqll);

    //$print = odbc_fetch_array ($result);


    // if (odbc_fetch_row($result)){
    //     echo json_encode(odbc_result($result,"id"));
    // }
//echo $result;
    // if($row = $result->fetch_assoc()){
    //     echo 'el id: ' . $row['id'], "\n";
    //     echo $tipo;
    // }
    
    //while ($row = $result->fetch_assoc()) {
        
        // echo json_encode('Activitat Lliure:' . $row['id']);
        // echo json_encode('Activitat clicada:' . $id);
        // echo json_encode('Tipo Activitat:' . $tipo);
    //}  



//     DELIMITER //
// CREATE PROCEDURE consultar_persones(_tipus VARCHAR(30), _dni VARCHAR(9))
//  BEGIN
// 	 IF _tipus = 'COLECTIVES' THEN SELECT d.id FROM client a, reserva_colectiva b, activitat c, activitat_colectiva d WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.data > curdate()AND b.anulada is null AND a.dni = _dni;
// 	 ELSEIF _tipus = 'LLIURES' THEN SELECT d.id FROM client a, reserva_lliure b, activitat c, activitat_lliure d WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.data > curdate() AND b.anulada is null AND a.dni = _dni;
// 	 END IF;
//  END
// //
// CALL consultar_persones('COLECTIVES','1234567L');
// SELECT id;


?>

