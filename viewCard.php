<?php
    session_start();

    if(!isset($_SESSION['adminemail'])){
        header("location:index.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>View Id</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <?php include "css/icon.html"; ?>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .button-shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .textbox-shadow {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .text-shadow {
        color: white;
        text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black;
    }

    .main {
        /* border: 1px solid red; */
        border-radius: 7px;
        width: 220px;
        height: 360px;
        margin-left: 40%;
        margin-top: 5%;
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

    <!-- Custom styles for this template -->
    <link href="css/sidebars.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="d-print-none d-flex flex-column p-3 text-white bg-dark m-2 rounded"
            style="width: 300px; height: 700px;">
            <a href="admindashboard.php"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                <span class="fs-4">Admin Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="studentlogindetails.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#login2" />
                        </svg>
                        Student Login Details
                    </a>
                </li>
                <li>
                    <a href="studentinfodetails.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#info" />
                        </svg>
                        Student Information
                    </a>
                </li>
                <li>
                    <a href="feedbackdata.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#feedback" />
                        </svg>
                        Students Feedback
                    </a>
                </li>
                <li>
                    <a href="idcards.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#card" />
                        </svg>
                        Id-Cards
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#key" />
                        </svg>
                        Change password
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-fill" />
                        </svg>
                        Manage Admins
                    </a>
                </li>
                <li class="dropdown">
                    <a href="logout.php" class="nav-link text-white">
                        <svg class="bi me-2" width="18" height="18">
                            <use xlink:href="#logout" />
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
            <hr>

            <!-- dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-light text-decoration-none " id="dropdownUser2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <svg class="bi me-2" width="18" height="18">
                        <use xlink:href="#people-circle" />
                    </svg>
                    <strong><?php echo $_SESSION['adminemail'];?></strong>
                </a>

            </div>
            <!-- dropdown -->

        </div>

        <div class="container mt-4 text-dark" style="width:80%; height: 100%;">
            <div class="row">
                <div class="col-sm-6 pt-4">
                    <?php
        include "database/connect.php";
        $email = $_GET['email'];
        $query="select * from studentinfo where email='$email'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
        $imageURL = 'img/'.$row["photo"];
    ?>
                    <div class="main button-shadow" id="idcard">
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
                                    <?php echo $row['firstname'].'  '.$row['middlename'].'  '.$row['lastname'];?></td>
                            </tr>
                            <tr>
                                <td class="info course" align="center" colspan="3"><?php echo $row['course'];?></td>
                            </tr>
                            <tr>
                                <td class="info" align="left" colspan="3">
                                    <b>DOB:</b><?php $bdate = date("d-m-Y", strtotime($row['birth_date'])); echo '  '.$bdate;?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Blood
                                        Group:</b><?php echo '  '.$row['blood_group'];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="info" align="left" colspan="3"><b>Mobile:
                                    </b><?php echo '  '.$row['mobile_no'];?></td>
                            </tr>
                            <tr>
                                <td class="info" align="left" colspan="3"><b>Email:</b><?php echo '  '.$row['email'];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="info" align="left" colspan="3"><b>Add: </b><?php echo '  '.$row['address'];?>
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
                <div class="col-sm-2 d-print-none " style="margin-block:auto;">
                    <button type="button" class="btn btn-secondary button-shadow " value="print"
                        onclick="window.print()">Print Card</button>
                    <hr>

                    <?php echo '<a href="update.php?email='. $email.'&id=admin"> <button type="button"
                            class="btn btn-secondary button-shadow" value="print">Update Card</button></a>';?>
                </div>
            </div>
        </div>
    </main>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>