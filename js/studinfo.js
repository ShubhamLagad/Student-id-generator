function mobnumber(){
    let mno = document.getElementById("mobno").value;
    console.log(mno);
    let len = mno.length;
    console.log(len);
    let check = isNaN(mno);
    console.log(check);
    if(len < 10 || len > 10 || check){
        document.getElementById("mobhelp").innerHTML="Enter correct mobile number!";
        return false;
    }else{
        document.getElementById("mobhelp").innerHTML="";
        return true;
    }
}

function insertinfo(){
    // let fname = document.getElementById("exampleFormControltext").value;
    let fname = document.getElementById("fname").value;
    let mname = document.getElementById("mname").value;
    let lname = document.getElementById("lname").value;
    let dob = document.getElementById("dob").value;
    let bgroup = document.getElementById("bg").value;
    let mobno = document.getElementById("mobno").value;
    let email = document.getElementById("email").value;
    let addr = document.getElementById("add").value;
    let course = document.getElementById("course").value;
   
    
    console.log(fname);console.log(mname);console.log(lname);console.log(dob);
    console.log(bgroup);console.log(mobno);console.log( email);console.log(addr);
    console.log(file);console.log(course);

    if(fname.length==0 || mname.length==0 || lname.length==0 || dob.length==0 || mobno.length==0  || addr.length==0 || course.length==0  )
    {
        // console.log("alert msg");
        alert("Please fill all details");
    }else{
        if(mobnumber()){
            let file = document.getElementById("file").files.item(0).name;
            console.log(file);
                    console.log("else loop");
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST","database/studinfo.php",true);
                    xmlhttp.onload = function() {
                        if (xmlhttp.status == 200) {
                            console.log(xmlhttp.responseText);
                            console.log("upload status :"+uploadFile());
                            if(uploadFile()==true || xmlhttp.responseText=="true"){
                                alert("Information Submited Successfully");
                                window.location.href = "welcome.php? email="+email;
                            }else{
                                alert("Failed! Information not submited");
                            }
                        }else{
                            console.log("problem occure");
                        } 
                    };
                    
                    const data = {fname:fname,mname:mname,lname:lname,dob:dob,bgroup:bgroup,mobno:mobno,email:email,addr:addr,course:course,file:file};
                    const mydata = JSON.stringify(data);
                    xmlhttp.send(mydata);
        }else{
            alert("Please enter valid details!");
        }
    }
}

function uploadFile() {
    var files = document.getElementById("file").files;
    var flag=1;
    if(files.length > 0 ){
       var formData = new FormData();
       formData.append("file", files[0]);
 
       var xhttp = new XMLHttpRequest();
 
       // Set POST method and ajax file path
       xhttp.open("POST", "database/studentimgupload.php", true);
 
       // call on request changes state
       xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
 
            var response = this.responseText;
            if(response == 1){
               console.log("true");
                flag=1;
            }else{
                console.log("false");
                flag=0;
            }
          }
       };
       // Send request with data
       xhttp.send(formData);
    }
    if(flag==1){
        return true;
    }else{
        return false;
    }
 }