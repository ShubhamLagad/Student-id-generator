
function alldata()
    {
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        console.log(email);
        console.log(password);
        
        if(email.length==0 || password.length==0)
            {
                window.alert("Please Fill all details");
            }else 
                {
                    console.log("In else loop");
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST", "database/adminlogin.php", true);
                    xmlhttp.onload = function() {
                        if (xmlhttp.status == 200) {
                            console.log(xmlhttp.responseText);
                            if(xmlhttp.responseText=="true"){
                                alert("Login successfull");
                                window.location.href= "admindashboard.php";
                            }else{
                                alert("Login Failed! Please enter correct email and password");
                            }
                        }else{
                            console.log("problem occure");
                        } 
                    };
                    const mydata = {email:email,password:password}; 
                    const data = JSON.stringify(mydata); 
                    xmlhttp.send(data);
                }
    }