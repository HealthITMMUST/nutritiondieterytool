<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require "dbh.php";

    $recipients = $_POST['recipients'];
    $pieces = explode(",", $recipients);
    for($i=0;$i<count($pieces);$i++){
        $phone = $pieces[$i];
        $sql = "INSERT INTO recipients(phone) VALUES('$phone')";
        mysqli_query($conn, $sql);
    }
    echo json_encode(array(
        'message' => 'success'
    ))
?>