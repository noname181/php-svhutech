<?php
include 'database_connection.php';
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$user = [];

$postdata = file_get_contents('php://input');
if ($postdata) {
    $idProvine = $postdata->id;
    $sql = "select * from quanhuyen where idtinhthanhpho =" .$idProvine;
    $result = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) != -1) {
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $user[$i] = $row[1];

            $i++;
        }
        //encode array php thành chuỗi json
        echo json_encode($user);
        //$string = implode(",",$user);
        //echo $string;
    } else {
        echo "Failed";
    }

}
