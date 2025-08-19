<?php 
    header("content-type: application/json; charset=utf-8");
    include("helper.php");

    if ($_SERVER['REQUEST_METHOD'] == "PUT") {
        include "../connect.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if ($id != "") {
                $read = $connect->query("SELECT * FROM member WHERE id = '$id'");
                $user = $read->fetch_assoc();

                if ($user) {
                    $input = json_decode(file_get_contents("php://input"));

                    $nama = $input->nama;
                    $role = $input->role;
                    $country = $input->country;

                    $destroy = $connect->query("UPDATE member SET nama = '$nama', role = '$role', country = '$country' WHERE id = '$id'");
        
                    $array_api = response_json(200, "Berhasil Mengupdate Data Member");
                } 
                
                else {
                    $array_api = response_json(404, "Data Member tidak ditemukan");
                }
            }

            else {
                $array_api = response_json(400, "ID tidak boleh kosong");
            }

        }

        else {
            $array_api = response_json(400, "ID tidak ditemukan");
        }

    } else {

        $array_api = response_json(405, "Metode tidak diperbolehkan");

    }

    echo json_encode($array_api);

?>