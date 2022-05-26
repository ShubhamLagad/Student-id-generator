<?php
include "connect.php";
$data =  file_get_contents("php://input");
$mydata = json_decode($data,true); 
// print_r($mydata);
// accept data from js file
$email= $mydata['email'];
$pass= $mydata['pass'];
session_start();
$flag=1;
    
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;
            $query = "select email, password from student";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result))
                {
                    if($_SESSION['email']==$row['email'] && $_SESSION['password']==$row['password'])
                    {
                         $flag=0;
                        echo "true";
                    }
                }
            if($flag==1)
            {
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                // session_destroy();
                echo "false";
            }
        
?>