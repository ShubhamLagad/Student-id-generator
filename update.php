<?php
    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['adminemail'])){
      header("location:index.php");
    }
    if(!isset($_SESSION['nemail']) || !isset($_SESSION['id'])){
      $_SESSION['nemail'] = $_GET['email'];
      $_SESSION['id'] = $_GET['id'];
    }
  $urlemail = $_SESSION['nemail'];
  $id = $_SESSION['id']; 
  include "database/connect.php";
if(isset($_POST['update'])) // when click on Update button
{
    $flag=1;

    $fname = strtoupper($_POST['fname']);
    $mname = strtoupper($_POST['mname']);
    $lname = strtoupper($_POST['lname']);

    $bdate = $_POST['dob'];

    $bloodgroup = strtoupper($_POST['bg']);
    $mobileno = $_POST['mobno'];
    $email = strtolower($_POST['email']);
    $address = ucwords($_POST['add']);
    $course = $_POST['course'];

    $photo =$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="img/";

    $new_size = $file_size/1024;  
    $new_file_name = strtolower($photo);
    $final_file=str_replace(' ','-',$new_file_name);
           
	if(empty($fname) || empty($mname) || empty($lname) || empty($bdate) || empty($mobileno) || empty($email) || empty($address) || empty($course) )
        {
            $flag=0;
            ?>
<script>
alert("Record updation failed");
window.location.href = 'update.php';
</script>
<?php
        }
    if(empty($bloodgroup))
        {
            $bloodgroup = "-";
        }
    if($flag==1)
        {
            $upload = move_uploaded_file($file_loc,$folder.$final_file);
            $edit = mysqli_query($con,"update studentinfo set firstname='$fname',middlename='$mname',lastname='$lname',birth_date='$bdate',blood_group='$bloodgroup',mobile_no='$mobileno',email='$email',address='$address',course='$course',photo='$photo' where email='$urlemail'");
	
            if($edit || $upload)
            {
                unset($_SESSION['nemail']);
                if($id=="admin"){
                  unset($_SESSION['id']);
                  ?>
<script>
alert("Information updated successfully");
window.location.href = 'studentinfodetails.php';
</script>
<?php
                }else{
                  unset($_SESSION['id']);
                  ?>
<script>
alert("Information updated successfully");
window.location.href = 'welcome.php?email=<?php echo $urlemail; ?>';
</script>
<?php
                }
              
            }
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

    <title>Update</title>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Please fill your correct Information</h2>
                    <?php
              $uemail = $_GET['email'];
              $sql = "select * from studentinfo where email = '$uemail'";
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_assoc($result);

          ?>
                    <form id="form" class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">First name</label>
                            <input type="text" class="form-control" name="fname"
                                value="<?php echo $row['firstname']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Middle name</label>
                            <input type="text" class="form-control" name="mname"
                                value="<?php echo $row['middlename']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname']; ?>"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" aria-label="date" name="dob"
                                value="<?php echo $row['birth_date']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Blood Group</label>
                            <input type="text" class="form-control" placeholder="eg. O+" name="bg"
                                value="<?php echo $row['blood_group']; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Mobile No</label>
                            <small class="text-danger" id="mobhelp"></small>
                            <input type="text" class="form-control" name="mobno" id="mobno"
                                value="<?php echo $row['mobile_no']; ?>" oninput="mobnumber()" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Address</label>
                            <input type="text" class="form-control" name="add" value="<?php echo $row['address']; ?>"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="validationDefault04" class="form-label">Course</label>
                            <select class="form-select" name="course" required>
                                <option selected><?php echo $row['course']; ?></option>
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
                            <label for="validationDefault05" class="form-label">Your Photo</label> <small>(File Format
                                : .jpg,.png,.jpeg)</small>
                            <input type="file" class="form-control" id="file" name="file"
                                value="<?php echo $row['photo']; ?>" required>
                        </div>

                        <div class="col-12">
                            <!-- <button class="btn btn-primary" type="button" id= "submit" name= "update" >Update</button> -->
                            <input type="Submit" value="Update" class="btn btn-primary" name="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/studinfo.js"></script>

</body>

</html>