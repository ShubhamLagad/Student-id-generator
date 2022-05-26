<?php
include "connect.php";

$data =  file_get_contents("php://input");
$mydata = json_decode($data,true);

// print_r($mydata);
$email = $mydata['email'];
$pass = $mydata['pass'];
$hint = $mydata['hint'];

$sql1 = "select email from student where passwordhint='$hint'";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result1);
$semail = $row['email'];

$sql = "update student set password='$pass' where email= '$semail' ";
$result = mysqli_query($con,$sql);
if($result){
    echo "true";
}else{
    echo "false";
}
?>