function deptValidate() {
    var department = document.getElementById("department").value;
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(department)) {
      document.getElementById("validatedepartment").innerHTML = "";
      return true;
    } else {
      document.getElementById("validatedepartment").innerHTML = "Please enter a valid department name (letters and spaces only)";
      return false;
    }
  }
  