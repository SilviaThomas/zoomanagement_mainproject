function lnameValidate(){
    var lastname = document.getElementById("lname").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(lastname.match(pattern)){
    document.getElementById("lnameValidate").innerHTML="";
    }
    else if(!lastname){
    document.getElementById("lnameValidate").innerHTML="Last Name Required";
    isValid=false;
    }
    else{
    document.getElementById("lnameValidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }
    function fnameValidate(){
    var lastname = document.getElementById("fname").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    
    if(lastname.match(pattern)){
    document.getElementById("fnameValidate").innerHTML="";
    }
    else if(!lastname){
    document.getElementById("fnameValidate").innerHTML="first Name Required";
    isValid=false;
    }
    else{
    document.getElementById("fnameValidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }

    function addressValidate(){
    var housename = document.getElementById("housename").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(housename.match(pattern)){
    document.getElementById("addressValidate").innerHTML="";
    }
    else if(!housename){
    document.getElementById("addressValidate").innerHTML="Address Required";
    isValid=false;
    }
    else{
    document.getElementById("addressValidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }

    function streetValidate(){
    var street = document.getElementById("street").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(street.match(pattern)){
    document.getElementById("cnoValidate").innerHTML="";
    }
    else if(!street){
    document.getElementById("cnoValidate").innerHTML="street Required";
    isValid=false;
    }
    else{
    document.getElementById("cnoValidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }

    function cityValidate(){
    var city = document.getElementById("city").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(city.match(pattern)){
    document.getElementById("ciValidate").innerHTML="";
    }
    else if(!city){
    document.getElementById("ciValidate").innerHTML="city Required";
    isValid=false;
    }
    else{
    document.getElementById("ciValidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }

    function stateValidate(){
    var state = document.getElementById("state").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(state.match(pattern)){
    document.getElementById("stvalidate").innerHTML="";
    }
    else if(!state){
    document.getElementById("stvalidate").innerHTML="state Required";
    isValid=false;
    }
    else{
    document.getElementById("stvalidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }

    function validatepwd(){
    var log_password  = document.getElementById("log_password").value;
    var pattern=/^(?=.*\d)(?=.*[A-Z]).{6,}/;
    isValid=true;
    if(log_password.match(pattern)){
    document.getElementById("validatepwd").innerHTML="";  
    }
    else if(!log_password){
    document.getElementById("validatepwd").innerHTML="Password Required";
    isValid=false;
    }
    else{
    document.getElementById("validatepwd").innerHTML="Your password must be at least 8 characters long, contain at least one number and have a mixture of uppercase and lowercase letters.";
    isValid=false;
    }
    return isValid;

    }


    function validatecontactno(){
    var contactno = document.getElementById("contactno").value;
    var pattern = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
    isValid=true;
    if(contactno.match(pattern)){
    document.getElementById("validatecontactno").innerHTML="";
    }
    else if(!contactno){
    document.getElementById("validatecontactno").innerHTML="Number required";
    isValid=false;
    }
    else{
    document.getElementById("validatecontactno").innerHTML="Invalid Contact Number";
    isValid=false;
    }
    return isValid;

    } 
    // function validateadharno(){
    // var adharno = document.getElementById("adharno").value;
    // var pattern =  /^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/; 
    // isValid=true;
    // if(adharno.match(pattern)){
    // document.getElementById("validateadharno").innerHTML="";
    // }
    // else if(!adharno){
    // document.getElementById("validateadharno").innerHTML="adharNumber required";
    // isValid=false;
    // }
    // else{
    // document.getElementById("validateadharno").innerHTML="Invalid adhar Number";
    // isValid=false;
    // }
    // return isValid;

    // }

    // function validatepincode(){
    //    var pincode = document.getElementById("pincode").value;
    //    var pattern =  /^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$/; 
    //    isValid=true;
    //    if(pincode.match(pattern)){
    //       document.getElementById("validatepincode").innerHTML="";
    //    }
    //    else if(!pincode){
    //       document.getElementById("validatepincode").innerHTML="pincode required";
    //       isValid=false;
    //    }
    //    else{
    //       document.getElementById("validatepincode").innerHTML="Invalid pincode Number";
    //       isValid=false;
    //    }
    //    return isValid;

    // } -->
    function validateemail(){
    var email = document.getElementById("email").value;
    var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/; 
    isValid=true;
    if(email.match(pattern)){
    document.getElementById("validateemail").innerHTML="";
    }
    else if(!adharno){
    document.getElementById("validateemail").innerHTML="adharNumber required";
    isValid=false;
    }
    else{
    document.getElementById("validateadharno").innerHTML="Invalid adhar Number";
    isValid=false;
    }
    return isValid;

    } 