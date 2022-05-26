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
    <title>Student Info</title>

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
        <div class="d-flex flex-column p-3 text-white bg-dark button-shadow m-2 rounded"
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

        <div class="d-flex flex-column p-3 text-dark bg-light" style="width: 100%; height: 100%;">
            <h1 class="bg-dark text-white text-center mb-12 button-shadow"
                style="margin-top:10px;margin-bottom:20px; padding:15px; border-radius:10px;">Student Information</h1>
            <!-- student information section -->
            <?php
                                include "database/connect.php";
                                echo '
                                    <table class="table table-hover text-center button-shadow rounded">
                                      
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Birth Date</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Mobile No</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">View Card</th>
                                        <th scope="col">Update Details</th>
                                        <th scope="col">Delete Student</th>
                                    </tr>';
                                $query = "select * from studentinfo";
                                $result = mysqli_query($con,$query);
                                $count=1;
                                while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo '
                                            <tr>
                                                <td scoperow">'.$count.'</td>
                                                <td scope="row">'.$row['firstname'].'</td>
                                                <td scope="row">'.$row['middlename'].'</td>
                                                <td scope="row">'.$row['lastname'].'</td>
                                                <td scope="row">'.$row['birth_date'].'</td>
                                                <td scope="row">'.$row['blood_group'].'</td>
                                                <td scope="row">'.$row['mobile_no'].'</td>
                                                <td scope="row">'.$row['email'].'</td>
                                                <td scope="row">'.$row['address'].'</td>
                                                <td scope="row">'.$row['course'].'</td>
                                                <td scope="row">'.$row['photo'].'</td>
                            
                                                <td scope="row"><a href="viewCard.php?email='.$row['email'].'"><input type="button" value="View" class="btn btn-success button-shadow"></a></td>
                            
                                                <td scope="row"><a href="update.php?email='.$row['email'].'&id=admin"><input type="button" value="Update" class="btn btn-warning button-shadow"></a></td>

                                                <td scope="row"><a onClick=\'javascript: return confirm("Can you delete this record?");\' href="delete.php?email='.$row['email'].'"><input type="button" value="Delete" class="btn btn-danger button-shadow"></a></td>
                                            </tr>';
                                            $count++;
                                    }
                                echo '</table>';
                            ?>
            <!-- student login section end-->
            <div class=" text-center">
                <a href="studinfo.php"><button class="btn btn-primary button-shadow"
                        style="width:200px; position:center;"> <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#card" />
                        </svg>Add Student</button></a>
            </div>
        </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>