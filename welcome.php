<?php
session_start(); 
if(!isset($_SESSION['email'])){
  header("location:index.php");
}
$email = $_GET['email'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
    .container {
        margin-top: 70px;
    }

    .main {
        border-radius: 7px;
        width: 220px;
        height: 360px;
        background-image: url(img/bg1.jpg);
        padding: 1px;
    }

    .name {
        font-size: 2.5mm;
    }

    .studname {
        font-size: 11px;
        font-weight: bold;
        font-family: serif;
    }

    .info {
        font-size: 3mm;
    }

    .photo {
        border: 1px solid black;
    }

    .photo1 {
        padding-left: 10px;
    }

    .bottom {
        font-size: 10px;
    }

    .bot {
        padding-top: 11px;
    }

    .principal {
        padding-right: 15px;
        font-weight: bold;
    }

    .dr {
        font-size: 10px;
    }

    .sign {
        padding-right: 13px;
    }
    </style>
</head>
<script>
function update() {
    window.location.href = "update.php?email=<?php echo $email; ?>&id=student";
}

function logout() {
    window.location.href = "logout.php";
}
</script>

<body class="bg-dark">
    <main>
        <div class="container col-xxl-10 col-xxl-8 px-4 py-5 bg-light">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start  ">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Thank You! For Creating Your ID</h1>
                    <p class="col-lg-10 fs-4">Your card is being process to make better. Please contact ID Department
                        and give
                        your card. Thank you!</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-warning btn-lg px-4 me-md-4"
                            onclick="update();">UPDATE</button>
                        <button type="button" class="btn btn-outline-danger btn-lg px-4"
                            onclick="logout();">LOGOUT</button>
                    </div>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <h3 class="display-6 fw-bold lh-1 mb-3">Your id-card</h3>
                    <hr class="my-6">
                    <div id="idcard">
                        <?php
                        include "database/connect.php";
                        $email = $_GET['email'];
                        $query="select * from studentinfo where email='$email'";
                        $result=mysqli_query($con,$query);
                        $row=mysqli_fetch_assoc($result);
                        $imageURL = 'img/'.$row["photo"];
                    ?>
                        <div class="main">
                            <table>
                                <tr>
                                    <td>
                                        <img src="img/vplogo.png" width="50mm" height="50mm">
                                    </td>
                                    <td colspan="2">
                                        <div class="name">
                                            Vidya Pratishthan's<br>
                                            <b>Art's Science and Commerce College</b><br>
                                            Vidyanagari,Baramati,Dist:Pune<br>
                                            Contact: 91-02112-239166<br>
                                            Website: www.vpasccollege.edu.in<br>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td colspan="" align="center" class="photo1">
                                        <img src="<?php echo $imageURL;?>" width="85px" height="92px" class="photo">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="studname" align="center" colspan="3">
                                        <?php echo $row['firstname'].'  '.$row['middlename'].'  '.$row['lastname'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info course" align="center" colspan="3">
                                        <?php echo $row['course'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info" align="left" colspan="3"><b>DOB:</b>
                                        <?php $bdate = date("d-m-Y", strtotime($row['birth_date'])); echo '  '.$bdate;?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Blood Group:</b>
                                        <?php echo '  '.$row['blood_group'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info" align="left" colspan="3"><b>Mobile: </b>
                                        <?php echo '  '.$row['mobile_no'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info" align="left" colspan="3"><b>Email:</b>
                                        <?php echo '  '.$row['email'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info" align="left" colspan="3"><b>Add: </b>
                                        <?php echo '  '.$row['address'];?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bot sign" colspan="3" align="right"><img src="img/sign.png" width="50px"
                                            height="30px"></td>
                                </tr>

                                <tr class="dr">
                                    <td colspan="3" align="right">Dr.Bharat Shinde </td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="bottom " align="left">Year Of Admission:2018-19</td>
                                    <td class="bottom principal" align="center">Principal</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>