function emailhandle(str) {
  // console.log(str);

  var atposition=str.indexOf("@");  
  var dotposition=str.lastIndexOf(".");  
  if (atposition<1 || dotposition<atposition+2 || dotposition+3>=str.length){  
      document.getElementById('hint').innerHTML = "Please enter valid email address!";
      return false;  
  }else{
      document.getElementById('hint').innerHTML = ""; 
      return true;
  }
}

function passwordclick(){
      // console.log("password hint");
      let pass = document.getElementById('pass').value;
      // console.log(pass);
      if(pass.length<8 || pass.length>16){
        document.getElementById("passhelp1").innerHTML = "Your password must be 8-16 characters long.";
        return false;
      }else{
        document.getElementById("passhelp1").innerHTML = "";
        return true;
      }
}

function passcheck(){
  let pass = document.getElementById('pass').value;
  let rpass = document.getElementById('rpass').value;
  // console.log(pass);
  // console.log(rpass);
  if(pass!=rpass){
    document.getElementById("passhelp2").innerHTML = "Passwword must be same !";
    return false;
  }else{
    document.getElementById("passhelp2").innerHTML = "";
    return true;
  }
}


function register(){
  // let fname = document.getElementById("exampleFormControltext").value;
  let fname = document.getElementById('fname').value;
  let lname = document.getElementById('lname').value;
  let email = document.getElementById('email').value;
  let pass = document.getElementById('pass').value;
  let rpass = document.getElementById('rpass').value;
  let phint = document.getElementById('passhint').value;
  console.log(fname);console.log(lname);console.log(email);console.log(pass);console.log(rpass);console.log(phint);
  
  if(fname.length==0 || lname.length==0 || email.length==0 || pass.length==0 || rpass.length==0 || phint.length==0 ){
    alert("Please fill all details ?");
  }else{
        console.log("In else loop");
        // console.log(passwordclick());
        // console.log(passcheck());
        // console.log(emailhandle(email));
        if(passwordclick() && passcheck() && emailhandle(email))
        {
          // console.log(phint);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "database/studsign.php", true);
            xmlhttp.onload = function() {
                if (xmlhttp.status == 200) {
                    console.log("database file response : "+xmlhttp.responseText);
                    if(xmlhttp.responseText=="true"){
                      alert("Account Created Successfully");
                      window.location.href = 'studsign.php';
                    }else{
                      alert("Account has already exists");
                      window.location.href = 'studsign.php';
                    }
                }else{
                    console.log("problem occure");
                } 
            };
          const mydata = {fname:fname,lname:lname,email:email,pass:pass,phint:phint}; 
          const data = JSON.stringify(mydata); 
          xmlhttp.send(data);
        }else{
            alert("Please enter valid details");
        }
  }
}


function validate(){
  let email = document.getElementById('lemail').value;
  let pass = document.getElementById('password').value;
  console.log(email);
  console.log(pass);

  if(email.length==0 || pass.length==0){
    alert("Please fill all details");
  }else{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "database/studlogin.php", true);
    xmlhttp.onload = function() {
        if (xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            if(xmlhttp.responseText=="true"){
              alert("Login successfull");
              window.location.href = 'studinfo.php';
            }else{
              alert("Login failed! Please enter valid email address and password.");
              window.location.href = 'studsign.php';
            }
            
        }else{
            console.log("problem occure");
        } 
     };
  const mydata = {email:email,pass:pass}; 
  const data = JSON.stringify(mydata); 
  xmlhttp.send(data);
}
}



