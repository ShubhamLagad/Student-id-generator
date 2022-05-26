<?php
    include "connect.php";

    $data = file_get_contents("php://input");
    $mydata = json_decode($data,true);

    $fname = strtoupper($mydata['fname']);
    $mname = strtoupper($mydata['mname']);
    $lname = strtoupper($mydata['lname']);

    $dob = $mydata['dob'];

    $bgroup = strtoupper($mydata['bgroup']);
    $mobno = $mydata['mobno'];
    $email = strtolower($mydata['email']);
    $addr = $mydata['addr'];
    $course = $mydata['course'];
    $file = $mydata['file'];

    if(empty($bgroup))
            {
                $bgroup = "-";
            }

    $query = "insert into studentinfo values('$fname','$mname','$lname','$dob','$bgroup','$mobno','$email','$addr','$course','$file')";
    $result = mysqli_query($con,$query);
    // echo var_dump($result);
    if($result)
    {
        echo "true";
    }else{
        echo "false";
    }
?>

