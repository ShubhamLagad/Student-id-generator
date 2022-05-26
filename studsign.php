<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/studsign.css">
    <title>Student Signin/Signup</title>
</head>
<style>
.login-wrap {
    margin-top: 20px;
}

.passwordhelp {
    margin-top: 5px;
    font-family: sans-serif;
}
</style>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form id="loginform" action="" method="POST" class="form-horizontal" role="form">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Email Address</label>
                            <input id="lemail" type="text" name="registrationno" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="password" type="password" name="password" class="input" data-type="password">
                        </div>

                        <div class="group">
                            <!-- <input type="submit" class="button" value="Sign In" onclick="validate()"
                                onclick="event.preventDefault()"> -->
                            <button type="button" class="button" onclick="validate()"
                                onclick="event.preventDefault()">Sign In</button>
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="forget.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <form id="signupform" action="" method="POST" class="form-horizontal" role="form">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">First Name</label>
                            <input id="fname" type="text" name="firstname" class="input">
                        </div>
                        <div class="group">
                            <label for="user" class="label">Last Name</label>
                            <input id="lname" type="text" name="lastname" class="input">
                        </div>

                        <div class="group">
                            <label for="email" class="label">Email address</label>
                            <small id="hint"></small>
                            <input id="email" type="email" name="email" class="input" oninput="emailhandle(this.value)">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <small id="passhelp1" class="">
                            </small>
                            <input id="pass" type="password" name="password" class="input" data-type="password"
                                oninput="passwordclick()">

                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <small id="passhelp2" class="">
                            </small>
                            <input id="rpass" type="password" name="confirmpassword" class="input" data-type="password"
                                oninput="passcheck()">
                        </div>

                        <!-- password hint -->
                        <div class="group">
                            <label for="pass" class="label">Password Hint </label>
                            <input id="passhint" type="text" name="passhint" class="input"
                                placeholder="what is your childhood name ?">
                        </div>
                        <!-- password hint end -->

                        <div class="group">
                            <!-- <input type="submit" class="button" value="Sign Up" onclick="register()"> -->
                            <button type="button" class="button" onclick="register()">Signup</button>
                        </div>
                        <div class="group">
                            <hr>
                        </div>
                        <div class="foot-lnk">
                            <a href="studsign.php">Already Member?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/studsign.js"></script>
</body>

</html>