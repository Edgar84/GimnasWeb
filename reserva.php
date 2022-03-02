<?php
    require 'connexio.php';
    session_start();

    $sql = "SELECT c.aforament_max FROM activitat a, es_fa b, sala c WHERE a.id = b.id AND b.num = c.num AND b.data > curdate();";
    $result = con()->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            echo $row['color'];
        }
    }
    else {
        echo "NO entro";
            
    }     

?>