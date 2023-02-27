function fnameValidate(){
    var lastname = document.getElementById("name").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(lastname.match(pattern)){
    document.getElementById("fnameValidate").innerHTML="";
    }
    else if(!lastname){
    document.getElementById("fnameValidate").innerHTML="Name Required";
    isValid=false;
    }
    else{
    document.getElementById("fnameValidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }

    // function validatecount(){
    //     var adharno = document.getElementById("regular").value;
    //     var pattern =  /^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/; 
    //     isValid=true;
    //     if(adharno.match(pattern)){
    //     document.getElementById("countValidate").innerHTML="";
    //     }
    //     else {
    //     document.getElementById("countValidate").innerHTML="Number required";
    //     isValid=false;
    //     }
        
    //     return isValid;
    // }


    // function validatecount1(){
    //     var adharno = document.getElementById("student").value;
    //     var pattern =  /^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/; 
    //     isValid=true;
    //     if(adharno.match(pattern)){
    //     document.getElementById("countValidate1").innerHTML="";
    //     }
    //     else {
    //     document.getElementById("countValidate1").innerHTML="Number required";
    //     isValid=false;
    //     }
        
    //     return isValid;
    // }

    // function validatecount2(){
    //     var adharno = document.getElementById("child").value;
    //     var pattern =  /^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/; 
    //     isValid=true;
    //     if(adharno.match(pattern)){
    //     document.getElementById("countValidate2").innerHTML="";
    //     }
    //     else {
    //     document.getElementById("countValidate2").innerHTML="Number required";
    //     isValid=false;
    //     }
        
    //     return isValid;
    // }