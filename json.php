<?php 
    //povezava na bazo
    $mysqli = new mysqli('localhost', 'root', 'madagaskar', 'crud') or die(mysqli_error($mysqli));

    //preberemo podatke iz baze
    $list = mysqli_query($mysqli, "SELECT * FROM data");

    //izpis podatkov v json
    $data =array();
    while($row = mysqli_fetch_assoc($list)){
        $data[] = $row;
    }
    echo json_encode($data);
?>