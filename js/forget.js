function passwordclick(str){
    if(str.length<8 || str.length>16){
      document.getElementById("passhelp1").innerHTML = "Your password must be 8-16 characters long.";
      return false;
    }else{
      document.getElementById("passhelp1").innerHTML = "";
      return true;
    }
}

function passcheck(){
let pass = document.getElementById('pass').value;
let cpass = document.getElementById('cpass').value;
// console.log(pass);
// console.log(rpass);
if(pass!=cpass){
  document.getElementById("passhelp2").innerHTML = "Passwword must be same !";
  return false;
}else{
  document.getElementById("passhelp2").innerHTML = "";
  return true;
}
}

function resetpass(){
    console.log("reste");

    let email = document.getElementById('email').value;
    let pass = document.getElementById('pass').value;
    let cpass = document.getElementById('cpass').value;
    let hint = document.getElementById('hint').value;
    console.log(email);
    console.log(cpass);
    console.log(hint);

    if(email.length==0 || hint.length==0){
        alert("Please enter all details");
    }else if(passwordclick(pass) && passcheck()){
        console.log("=============");
        console.log(passwordclick(pass));
        console.log(passcheck());
        console.log("=============");
        console.log("In else loop1");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "database/forget.php", true);
        xmlhttp.onload = function() {
            if (xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                if(xmlhttp.responseText == "true"){
                    var bool = confirm("Password change successfully!  Can you login ?");
                    if(bool==true){
                        window.location.href="studsign.php";
                    }
                    // alert("Password change successfully!")
                }else{
                    alert("Failed! Please enter correct details.")
                }
            }else{
                console.log("problem occure");
            } 
        };
        const mydata = {email:email,pass:cpass,hint:hint}; 
        const data = JSON.stringify(mydata); 
        xmlhttp.send(data);
    }else{
        alert("Please enter valid details!");
    }
}