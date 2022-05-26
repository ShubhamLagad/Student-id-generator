<?php
    session_start();

    if(!isset($_SESSION['adminemail'])){
        header("location:index.php");
    }
?>
<?php
    include "database/connect.php";

    $sql  = "select email from student";
    $result = mysqli_query($con,$sql);
    $loginCount = 0;
   while(mysqli_fetch_assoc($result)){
       $loginCount++;
   }

    $sql2  = "select email from studentinfo";
    $result2 = mysqli_query($con,$sql2);
    $idCount = 0;
   while(mysqli_fetch_assoc($result2)){
       $idCount++;
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
    <title>AdminDashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <?php include "css/icon.html"; ?>
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
    </style>
    <!-- Custom styles for this template -->
    <link href="css/sidebars.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="d-flex flex-column p-3 text-white bg-dark m-2 rounded button-shadow"
            style="width: 300px; height: 700px;">
            <a href="admindashboard.php"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
                aria-current="page">
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

        <div class="d-flex flex-column p-3 text-dark bg-light button-shadow m-2 rounded"
            style="width: 1250px; height: 700px;">
            <div class="text-center">
                <h1 class="text-shadow text-danger "> Welcome to Your Website.....</h1>
                <hr>
                <div class="row pt-4" style="margin-inline: 100px;">
                    <div class="col-sm-6">
                        <div class="card textbox-shadow">
                            <div class="card-body">
                                <h3 class="card-title text-shadow">Total Student Login</h3>
                                <hr>
                                <h1><strong class="text-danger text-shadow"><?php
                                echo "<h1>".$loginCount."</h1>"; ?></strong></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card textbox-shadow">
                            <div class="card-body">
                                <h3 class="card-title text-shadow">Total Id-Card Generated</h3>
                                <hr>
                                <h1><strong class="text-danger text-shadow"><?php
                                echo "<h1>".$idCount."</h1>"; ?></strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>