<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');
    
    require "dbh.php";

    $sql = "SELECT * FROM recipients";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $phone = $row['phone'];
        $joined = $row['joined'];
        $datetime1 = strtotime($joined);
        $datetime2 = new DateTime();
        $datetime2 = $datetime2->getTimestamp();
        $days = floor(abs($datetime1 - $datetime2)/60/60/24);

        $sql = "SELECT * FROM messages";
        $result2 = mysqli_query($conn, $sql);
        while($row2 = mysqli_fetch_assoc($result2)){
            $duration = $row2['duration'];
            $message = $row2['tmessage'];
            if($days == $duration){
                sendMessage($message, $phone);
            }
        }
    }
    function sendMessage($m, $n) {
        // Your PHP installation needs cUrl support, which not all PHP installations
        // include by default.
        // To run under docker:
        // docker run -v $PWD:/code php:7.3.2-alpine php /code/code_sample.php

        $username = 'husseinw';
        $password = 'Fiorentina1*';
        $messages = array(
        array('to'=>$n, 'body'=>$m)
        );  

        $result = send_message( json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password );

        if ($result['http_status'] != 201) {
        print "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response']);
        } else {
        print "Response " . $result['server_response'];
        // Use json_decode($result['server_response']) to work with the response further
        }
        /*$apiKey = urlencode('gtE1Y3w+mDc-otc633csILWH9kRQEwBfVGOC9tpVFS');
	
        // Message details
        $sender = urlencode('HEALTHPILE');
        $textmessage = rawurlencode($m);
    
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $n, "sender" => $sender, "message" => $textmessage);
    
        // Send the POST request with cURL
        $ch = curl_init('https://api.txtlocal.com/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Process your response here
        echo json_encode(array(
            'message' => $response
        ));*/
    }
    function send_message ( $post_body, $url, $username, $password) {
        $ch = curl_init( );
        $headers = array(
        'Content-Type:application/json',
        'Authorization:Basic '. base64_encode("$username:$password")
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
        // Allow cUrl functions 20 seconds to execute
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
        // Wait 10 seconds while trying to connect
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
        $output = array();
        $output['server_response'] = curl_exec( $ch );
        $curl_info = curl_getinfo( $ch );
        $output['http_status'] = $curl_info[ 'http_code' ];
        $output['error'] = curl_error($ch);
        curl_close( $ch );
        return $output;
    }
?>