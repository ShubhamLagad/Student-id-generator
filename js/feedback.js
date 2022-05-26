function emailhandle(str) {
    // console.log(str);

    var atposition=str.indexOf("@");  
    var dotposition=str.lastIndexOf(".");  
    if (atposition<1 || dotposition<atposition+2 || dotposition+3>=str.length){  
        document.getElementById('hint').innerHTML = "<span class='alert text-danger'>Please enter valid email address!</span>";
        return false;  
    }else{
        document.getElementById('hint').innerHTML = "<span class='alert text-success'>You can go now!</span>"; 
        return true;
    }
}

function allfield(){
    let fname = document.getElementById("exampleFormControltext").value;
    let femail = document.getElementById("exampleFormControlInput1").value;
    let fcomment = document.getElementById("exampleFormControlTextarea1").value;
    // console.log("hello"); 
    console.log(fname);
     console.log(femail);
     console.log(fcomment);
     
    if(fname.length==0 || femail.length==0 || fcomment.length==0 ){
        window.alert("Please Fill all details");
    }else 
        {
            console.log("In else loop");
            console.log(emailhandle(femail));
            if(emailhandle(femail)){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "database/feedback.php", true);
            xmlhttp.onload = function() {
                if (xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText);
                    alert(xmlhttp.responseText);
                }else{
                    console.log("problem occure");
                } 
            };
            const mydata = {name:fname,email:femail,comment:fcomment}; 
            const data = JSON.stringify(mydata); 
            xmlhttp.send(data);
            }else{
                alert("Please enter valid details");
            }
        }
}