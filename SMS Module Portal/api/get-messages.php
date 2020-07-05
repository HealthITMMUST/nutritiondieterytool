<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');
    
    require "dbh.php";

    //messages
    $sql = "SELECT * FROM messages";
    $result = mysqli_query($conn, $sql);
    $messages = array();
    while($row = mysqli_fetch_assoc($result)){
        $message = array(
            'id' => $row['id'],
            'message' => $row['tmessage'],
            'time' => $row['duration']
        );
        array_push($messages, $message);
    }

    //recipients
    $sql = "SELECT * FROM recipients";
    $result = mysqli_query($conn, $sql);
    $recipients = array();
    while($row = mysqli_fetch_assoc($result)){
        $joined = $row['joined'];
        $datetime1 = strtotime($joined);
        $datetime2 = new DateTime();
        $datetime2 = $datetime2->getTimestamp();
        $days = floor(abs($datetime1 - $datetime2)/60/60/24);
        $recipient = array(
            'phone' => $row['phone'],
            'duration' => $days
        );
        array_push($recipients, $recipient);
    }
    echo json_encode(array(
        'messages' => $messages,
        'recipients' => $recipients
    ));
?>