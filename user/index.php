<?php 

    header("content-type: application/json; charset=utf-8");
    include("helper.php");

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        include "../connect.php";

        $read = $connect->query("SELECT * FROM member");
        $data = $read->fetch_all(MYSQLI_ASSOC);
        $array_api = response_json(200, "Data member berhasil diterima", $data);
    }
    
    else {
        $array_api = response_json(405, "Method Not Allowed");
    }

    echo json_encode($array_api);

?>