function tnameValidate() {
    var tname = document.getElementById("taskname").value.trim();
  
    // Check if the input value is empty
    if (tname == "") {
      document.getElementById("validatetname").innerHTML = "Please enter a task name.";
      return false;
    }
  
    // Check if the input value contains only alphabetical characters
    var regex = /^[a-zA-Z]+$/;
    if (!regex.test(tname)) {
      document.getElementById("validatetname").innerHTML = "Task name can only contain alphabetical characters.";
      return false;
    }
  
    // If the input value is valid, clear the error message and return true
    document.getElementById("validatetname").innerHTML = "";
    return true;
  }

  
  function commentValidate() {
    var comment = document.getElementById("comment").value;
    var error = document.getElementById("validatetcomment");
    
    if (comment == "") {
      error.innerHTML = "Please enter your comment.";
      return false;
    } else {
      error.innerHTML = "";
      return true;
    }
  }
  