<?php
function response_json($status, $message, $data = "")
{
    http_response_code($status);

    $array = [
        'status' => $status,
        'message' => $message
    ];

    if ($data != "") {
        $array['data'] = $data;
    }

    return $array;

}

?>
