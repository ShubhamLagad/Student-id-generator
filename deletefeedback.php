<?php
    session_start();

    if(!isset($_SESSION['adminemail'])){
        header("location:index.php");
    }
?>
<?php

include "database/connect.php"; 

$srno = $_GET['srno'];

$del = mysqli_query($con,"delete from feedback where sr_no = '$srno'"); // delete query

if($del)
{
    ?>
<script>
alert("Feedback deleted successfully");
window.location.href = 'feedbackdata.php';
</script>
<?php
}
else
{
    ?>
<script>
alert("Error deleting feedback");
window.location.href = 'feedbackdata.php';
</script>
<?php
}
?>