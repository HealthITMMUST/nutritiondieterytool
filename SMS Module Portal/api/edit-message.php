<?php
    ob_flush();
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require "dbh.php";

    $id = $_POST['id'];
    $message = $_POST['message'];
    $days = $_POST['days'];

    $sql = "UPDATE messages SET duration = '$days', tmessage = '$message' WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo json_encode(array(
            'message' => 'success'
        ));
    }
    else
    {
        echo json_encode(array(
            'message' => 'error'
        ));
    }
    ob_end_flush();
?>