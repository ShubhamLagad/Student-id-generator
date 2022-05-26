<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- CSS Files -->
    <link href="css/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstraps.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">

</head>
<script>
    function student() {
        window.location.href = "studsign.php";
    }
</script>
<style>
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

<body>
    <div class="front">
        <section id="hero" class="d-flex align-items-center">
            <!-- ======= Header ======= -->
            <header id="header" class="fixed-top d-flex align-items-cente">
                <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

                    <h1 class="logo me-auto me-sm-0"><a href="index.php">Id Generator</a></h1>
                    <nav id="navbar" class="navbar order-last order-sm-0">
                        <ul>
                            <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                            <li><a class="nav-link scrollto" href="studsign.php">Log in</a></li>
                            <li><a class="nav-link scrollto" href="help.html">Help</a></li>
                            <li><a class="nav-link scrollto" href="gallary.html">Gallery</a></li>
                            <li><a class="nav-link scrollto" href="feedback.php">Feedback</a></li>
                        </ul>
                    </nav><!-- .navbar -->
                    <a href="#" class="book-a-table-btn scrollto d-none d-lg-flex">Contact Us</a>
                </div>
            </header><!-- End Header -->
            <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-8 text-shadow">
                        <h1>Welcome to <span>Student Id Generator</span></h1>
                        <h2>Create your Id Here!</h2>

                        <div class="btns">
                            <a class="btn-book animated fadeInUp scrollto button-shadow" onclick="student();">Get
                                Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Hero -->
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center"><b>Feedback</b></h1>
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active text-center">
                            <h2>Admin</h2>
                            <strong>
                                <small>
                                    <div class="feedbackcol">
                                        This is admin feedback
                                    </div>
                                </small>
                            </strong>
                        </div>
                        <?php
                        include "database/connect.php";
                        $sql = "select * from feedback";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="item text-center">
                                <h2>
                                    <?php echo $row['name']; ?>
                                </h2>
                                <strong>
                                    <small>
                                        <div class="feedbackcol">
                                            <?php echo $row['comment']; ?>
                                        </div>
                                    </small>
                                </strong>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="left bg-dark carousel-control pt-4 m-4 rounded" href="#myCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right bg-dark carousel-control pt-4 m-4 rounded" href="#myCarousel" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Give Your Feedback Here!</h2>
                <hr>
                <form method="POST" id="myform">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="exampleFormControltext" placeholder="Enter your name here">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <small id="hint"></small>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" oninput="emailhandle(this.value)">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Your comment</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type here......."></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit" class="btn btn-primary shadow" onclick="allfield()">
                    </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Start about section -->
    <div class="container">
        <div class="row">
            <div class="col-sm text-center">
                <h3>About Us</h3>
                <small>
                    Student-id-generator provides features<br> to student to fill there information<br> and generate
                    there id's
                    in soft copy.
                </small>
            </div>
            <div class="col-sm text-center">
                <h3>Contact Us</h3>
                <small>
                    Email:shubhamlagad2000@gmail.com<br>
                    Vidya pratishthan's Art's,Science and Commerce College,Baramati <br>Ph.00245825
                </small>
            </div>
        </div>
    </div>
    <!-- End about section -->
    <br><br>
    <!-- start footer -->
    <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2020 || Design By Shubham Lagad & Sagar Rote || <a href="adminlogin.html">Admin
                Login</a></small>
    </footer>
    <!-- end footer -->

    <!-- JS Files -->
    <script src="js/aos.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="js/main.js"></script>
    <script src="js/feedback.js"></script>

</body>

</html>