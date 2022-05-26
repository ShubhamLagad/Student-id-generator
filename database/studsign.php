<?php

include "connect.php";

    $data =  file_get_contents("php://input");
    $mydata = json_decode($data,true); 

    // print_r($mydata);
    // accept data from js file
    $fname= strtoupper($mydata['fname']);
    $lname= strtoupper($mydata['lname']);
    $email= $mydata['email'];
    $pass= $mydata['pass'];
    $phint= $mydata['phint'];

    $flag=1;
    // check if account is exists or not
    $query1 = "select email from student";
    $result1 = mysqli_query($con,$query1);
    while($row1 = mysqli_fetch_assoc($result1))
        {
            if($row1['email']== $email)
                {
                    $flag=0;
                }

        }
    
    // insert into student table
    if($flag==1){
        $query2 = "insert into student values('$fname','$lname','$email','$pass','$phint')";
        $result2 = mysqli_query($con,$query2);
        // echo var_dump($result);
        if($result2){
            echo "true";
        }
    }else{
        echo "false";
    }

?>