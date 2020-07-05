<?php
    ob_flush();
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require "../dbh.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo json_encode(array(
            'message' => 'DB error'
        ));
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
            $passwordCheck = password_verify($password, $row['password']);
            if($passwordCheck == false)
            {
                echo json_encode(array(
                    'message' => 'password'
                ));
            }
            else if($passwordCheck == true)
            {
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $fname = $row['fname'];
                $email = $row['email'];
                $logged = bin2hex(random_bytes(16)).uniqid();
                $secret = "f!f#cTR4/f*6=OB";
                $logged = hash_hmac('sha256', $logged, $secret);

                $sql = "UPDATE users SET logged = '$logged' WHERE email = '$email'";
                if(mysqli_query($conn, $sql)){
                    echo json_encode(array(
                        'message' => 'success',
                        'fname' => $fname,
                        'email' => $email,
                        'logged' => $logged
                    ));
                }
            }
            else
            {
                echo json_encode(array(
                    'message' => 'error'
                ));
            }
        }
        else
        {
            echo json_encode(array(
                'message' => 'nouser'
            ));
        }
    }
    ob_end_flush();
?>