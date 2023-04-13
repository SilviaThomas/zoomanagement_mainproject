function tasknameValidate() {
    var taskName = document.getElementById("taskname").value;
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(taskName)) {
      document.getElementById("validatetasks").innerHTML = "";
      return true;
    } else {
      document.getElementById("validatetasks").innerHTML = "Please enter a valid task name (letters and spaces only)";
      return false;
    }
  }

  function commentValidate() {
    var comment = document.getElementById("comment").value.trim();
    var commenttasks = document.getElementById("commenttasks");
  
    if (comment === "") {
      commenttasks.innerHTML = "Comment field is required";
      return false;
    } else {
      commenttasks.innerHTML = "";
      return true;
    }
  }

  function validateDropdown() {
    var dropdown = document.getElementById("firstname");
    var selectedOption = dropdown.options[dropdown.selectedIndex].value;
    if (selectedOption == "") {
      alert("Please select an option.");
    }
  }
  
  