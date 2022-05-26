<?php
    include "database/connect.php";
    if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['comment']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $sql = "insert into feedback values('$name','$email','$comment')";
            $result = mysqli_query($con,$sql);
            // echo var_dump($result);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Feedback</title>
</head>

<body style="background-image:url(img/record4.jpg);background-size: cover;background-size:100% 800px;">
    <form action="" method="POST" style="width:500px;margin-top:100px;margin-left:200px; "
        class="border rounded border-light border-4 p-3 bg-light" id="myform">
        <div class="mb-3">
            <h1 class="text-center">Feedback</h1>
            <hr>
        </div>
        <div class="mb-3">
            <label for="exampleFormControltext" class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControltext" placeholder="Your name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <small id="hint"></small>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com" oninput="emailhandle(this.value)">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Your Feedback</label>
            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"
                placeholder="Type here....."></textarea>
        </div>
        <div class="mb-3 ">
            <!-- <button type="button"  class="btn btn-success" onclick = "allfield()">Submit</button> -->
            <input type="submit" value="Submit" class="btn btn-success" onclick="allfield()">
        </div>
    </form>
    <script src="js/feedback.js"></script>
</body>

</html>