<?php
    session_start();

    if(!isset($_SESSION['adminemail'])){
        header("location:index.php");
    }
?>
<?php

include "database/connect.php"; 

$email = $_GET['email'];

$del = mysqli_query($con,"delete from student where email = '$email'"); // delete query

if($del)
{
    ?>
<script>
alert("Record deleted successfully");
window.location.href = 'studentlogindetails.php';
</script>
<?php
}
else
{
    ?>
<script>
alert("Error deleting record");
window.location.href = 'studentlogindetails.php';
</script>
<?php
}
?>