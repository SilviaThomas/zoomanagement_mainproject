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


   
   
    // function validateemail(){
    // var email = document.getElementById("email").value;
    // var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/; 
    // isValid=true;
    // if(email.match(pattern)){
    // document.getElementById("validateemail").innerHTML="";
    // }
    // else if(!adharno){
    // document.getElementById("validateemail").innerHTML="email required";
    // isValid=false;
    // }
    // else{
    // document.getElementById("validateemail").innerHTML="Invalid email Number";
    // isValid=false;
    // }
    // return isValid;

    // } 
    function validateemail() {
        var emailInput = document.getElementById("email");
        var emailError = document.getElementById("validateemail");
        var email = emailInput.value;
        var isValid = true;
      
        // Check if email is empty
        if (!email) {
          emailError.innerHTML = "Email is required";
          isValid = false;
        } 
        // Check if email is in a valid format
        else if (!isValidEmail(email)) {
          emailError.innerHTML = "Invalid email format";
          isValid = false;
        } 
        // Clear error message if email is valid
        else {
          emailError.innerHTML = "";
        }
      
        return isValid;
      }
      
      function isValidEmail(email) {
        // Regular expression pattern for validating email format
        var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
        return pattern.test(email);
      }
      
      // Attach the validateemail() function to the blur event of the email input field
      document.getElementById("email").addEventListener("blur", validateemail);
      