<?php
    include "connect.php";

    $data =  file_get_contents("php://input");
    $mydata = json_decode($data,true); 

    // print_r($mydata);
    $name= $mydata['name'];
    $email= $mydata['email'];
    $comment= $mydata['comment'];
    
    $sql = "INSERT INTO `feedback` (`sr_no`, `name`, `email`, `comment`) VALUES (NULL, '$name', '$email', '$comment')";
    $result = mysqli_query($con,$sql);
    
    if($result){
        echo "Successfully Submited !";
    }else{
        echo "Problem occured !!";

    }
    
?>