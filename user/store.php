<?php

    header('Content-Type: application/json');

    include('helper.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include("../connect.php");

        $input = json_decode(file_get_contents("php://input"));

        $nama = $input->nama;
        $role = $input->role;
        $country = $input->country;

            if($nama == "" || $role == "" || $country == "") {
                $array_api = response_json(400, "Data member tidak boleh kosong!");
            }

            else {
                $store = $connect->query("INSERT INTO member (nama, role, country) VALUES ('$nama', '$role', '$country')");
                $array_api = response_json(200, 'Berhasil menambah data member');
            }
    }

    else {
        $array_api = response_json(405, 'Metode tidak diizinkan');
    }

    echo json_encode($array_api);
?>
