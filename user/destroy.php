<?php 
    header("content-type: application/json; charset=utf-8");
    include("helper.php");

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

        include "../connect.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if ($id != "") {
                $read = $connect->query("SELECT * FROM member WHERE id = '$id'");
                $user = $read->fetch_assoc();

                if ($user) {
                    $destroy = $connect->query("DELETE FROM member WHERE id = '$id'");
                    $array_api = response_json(200, "Berhasil Menghapus member");
                } 

                else {
                    $array_api = response_json(404, "Member tidak ditemukan");
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