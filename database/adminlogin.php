<?php
    session_start();
    $data = file_get_contents("php://input");
    $mydata = json_decode($data,true);


    $email = $mydata['email'];
    $password = $mydata['password'];

    $_SESSION['adminemail'] = $email;

    if($email=="shubham@2000" || $password=="admin@2000")
        {
            echo "true";
        }else{
            unset($_SESSION['adminemail']);
            echo "false";
        }

?>