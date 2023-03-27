function animalnameValidate(){
    var animalname = document.getElementById("animalname").value;
    var pattern =  /^[a-zA-Z]+$/;
    isValid=true;
    if(animalname.match(pattern)){
    document.getElementById("animalnamevalidate").innerHTML="";
    }
    else if(!animalname){
    document.getElementById("animalnamevalidate").innerHTML="Name Required";
    isValid=false;
    }
    else{
    document.getElementById("animalnamevalidate").innerHTML="Only characters are acceptable";
    isValid=false;
    }
    return isValid;
    }


    function detailsValidate(){
    
        var desc = document.getElementById("details").value;
        var pattern =  /^[a-zA-Z]+$/;
        isValid=true;
        if(desc.match(pattern)){
        document.getElementById("detailsvalidate").innerHTML="";
        }
        else if(!desc){
        document.getElementById("detailsvalidate").innerHTML="Details Required";
        isValid=false;
        }
        else{
        document.getElementById("detailsvalidate").innerHTML="Only characters are acceptable";
        isValid=false;
        }
        return isValid;
        }
    
        function cagenumber() {
            const input = document.getElementById("cage").value;

        
            
            // check if input is a string
            if (typeof input !== 'string') {
              alert("Invalid number: not a string");
              return false;
            }
            
            // use regular expression to validate number format
            const regex = /^\d*\.?\d+$/;
            if (!regex.test(input)) {
              alert("Invalid number: incorrect format");
              return false;
            }
            
            // check if input is a valid number
            const number = Number(input);
            if (isNaN(number)) {
              alert("Invalid number: not a valid number");
              return false;
            }
            
            // check if input is negative
            if (number < 0) {
              alert("Invalid number: negative values not allowed");
              return false;
            }
            
            // number is valid
            return true;
          }
          