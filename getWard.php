<?php
include 'database_connection.php';
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$user = [];

$postdata = file_get_contents('php://input');

$request = json_decode($postdata);

if ($postdata) {
    
    $idDistrict = $request->id;
    $sql = "select * from phuongxa where idquanhuyen =" .$idDistrict;
    
    $result = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) != -1) {
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $user[$i]['tenphuongxa'] = $row[1];
            $user[$i]['idphuongxa'] = $row[0];
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

?>
