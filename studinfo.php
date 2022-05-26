<?php
    session_start();
    if(!isset($_SESSION['email'])){
      header("location:index.php");
    }
    include "database/connect.php";
    $flag=0;
    $query1 = "select email from studentinfo";
    $result1 = mysqli_query($con,$query1);
    $email = $_SESSION['email'];

    while($row1 = mysqli_fetch_assoc($result1))
        {
            if($_SESSION['email']==$row1['email'])
            {
                header("location:welcome.php?email=$email");
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Please fill your correct Information</h2>
                    <form id="form" class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="fname" value="" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="mname" value="" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lname" value="" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" aria-label="date" id="dob">
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Blood Group</label>
                            <input type="text" class="form-control" placeholder="eg. O+" id="bg">
                        </div>

                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Mobile No</label>
                            <small class="text-danger" id="mobhelp"></small>
                            <input type="text" class="form-control" id="mobno" oninput="mobnumber()" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email"
                                value="<?php echo $_SESSION['email']; ?>" required readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Address</label>
                            <input type="text" class="form-control" id="add" required>
                        </div>
                        <div class="col-md-3">
                            <label for="validationDefault04" class="form-label">Course</label>
                            <select class="form-select" id="course" required>
                                <option selected disabled value="">Choose...</option>
                                <option>BSc.Computer Science</option>
                                <option>BSc.Biotechnology</option>
                                <option>BSc.Regular</option>
                                <option>MSc.Computer Science</option>
                                <option>BBA(Business Administration)</option>
                                <option>BBA LL.B</option>
                                <option>B.Com.(Commerce)</option>
                                <option>B.Com LL.B.</option>
                                <option>B.Sc.Mathematics</option>
                                <option>BCA(Computer Applications)</option>
                                <option>B.Sc.Information Technology</option>
                                <option>B.Sc.Nursing</option>
                                <option>B.Sc.Graphics </option>
                                <option>B.Sc.Animation </option>
                                <option>B.Sc.Multimedia</option>
                                <option>BA/B.Sc.Liberal Arts</option>
                                <option>B.Sc.Physics</option>
                                <option>B.Sc.Chemistry</option>
                                <option>BMS(Management Science)</option>
                                <option>B.Sc.Interior Design</option>
                                <option>BBS(Business Studies)</option>
                                <option>BSW(Social Work)</option>
                                <option>BFA(Fine Arts)</option>
                                <option>BEM(Event Management)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault05" class="form-label">Your Photo</label>
                            <small>(File Format
                                : .jpg,.png,.jpeg)</small>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>

                        <div class="col-12">
                            <!-- <button class="btn btn-primary" type="button" id= "submit" onclick="insertinfo()">Submit Information</button> -->
                            <input type="Submit" value="Submit Information" class="btn btn-primary" id="submit"
                                onclick="insertinfo()">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/studinfo.js"></script>

</body>

</html>