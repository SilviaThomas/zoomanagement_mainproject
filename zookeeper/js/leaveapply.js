function reasonValidate() {
    var reasonInput = document.getElementById("reason");
    var reasonError = document.getElementById("validatereason");
    var reason = reasonInput.value.trim();
    var isValid = true;
  
    // Check if reason is empty
    if (!reason) {
      reasonError.innerHTML = "Reason is required";
      isValid = false;
    } 
    // Check if reason is too short
    else if (reason.length < 5) {
      reasonError.innerHTML = "Reason should be at least 5 characters long";
      isValid = false;
    } 
    // Check if reason contains only letters and spaces
    else if (!/^[a-zA-Z\s]+$/.test(reason)) {
      reasonError.innerHTML = "Reason should contain only letters and spaces";
      isValid = false;
    } 
    // Clear error message if reason is valid
    else {
      reasonError.innerHTML = "";
    }
  
    return isValid;
  }
  
  // Attach the reasonValidate() function to the blur event of the reason input field
  document.getElementById("reason").addEventListener("blur", reasonValidate);

  
  function startdateValidate() {
    var startDateInput = document.getElementById("startdate");
    var startDateError = document.getElementById("validatestartdate");
    var startDate = startDateInput.value.trim();
    var today = new Date();
    var isValid = true;
  
    // Check if start date is empty
    if (!startDate) {
      startDateError.innerHTML = "Starting date is required";
      isValid = false;
    } 
    // Check if start date is in the past
    else if (new Date(startDate) < today) {
      startDateError.innerHTML = "Starting date cannot be in the past";
      isValid = false;
    } 
    // Clear error message if start date is valid
    else {
      startDateError.innerHTML = "";
    }
  
    return isValid;
  }
  
  // Attach the startdateValidate() function to the blur event of the start date input field
  document.getElementById("startdate").addEventListener("blur", startdateValidate);

  
  function lastdateValidate() {
    var lastDateInput = document.getElementById("lastdate");
    var lastDateError = document.getElementById("validatelastdate");
    var lastDate = lastDateInput.value.trim();
    var startDate = document.getElementById("startdate").value.trim();
    var today = new Date();
    var isValid = true;
  
    // Check if last date is empty
    if (!lastDate) {
      lastDateError.innerHTML = "Last date is required";
      isValid = false;
    } 
    // Check if last date is in the past
    else if (new Date(lastDate) < today) {
      lastDateError.innerHTML = "Last date cannot be in the past";
      isValid = false;
    } 
    // Check if last date is before or equal to start date
    else if (lastDate < startDate) {
      lastDateError.innerHTML = "Last date cannot be before start date";
      isValid = false;
    } 
    // Clear error message if last date is valid
    else {
      lastDateError.innerHTML = "";
    }
  
    return isValid;
  }
  
  // Attach the lastdateValidate() function to the blur event of the last date input field
  document.getElementById("lastdate").addEventListener("blur", lastdateValidate);

  

  function dateValidate() {
    var startDateInput = document.getElementById("startdate");
    var lastDateInput = document.getElementById("lastdate");
    var mcUploadDiv = document.getElementById("mcupload");
    var startDate = new Date(startDateInput.value);
    var lastDate = new Date(lastDateInput.value);
    var daysDiff = (lastDate - startDate) / (1000 * 60 * 60 * 24);
    var isValid = true;
  
    // Check if start date is empty
    if (!startDateInput.value) {
      startDateInput.setCustomValidity("Start date is required");
      isValid = false;
    } 
    // Check if last date is empty
    if (!lastDateInput.value) {
      lastDateInput.setCustomValidity("Last date is required");
      isValid = false;
    } 
    // Check if last date is before or equal to start date
    if (lastDate < startDate) {
      lastDateInput.setCustomValidity("Last date cannot be before start date");
      isValid = false;
    } 
    // Clear error message if both dates are valid
    else {
      startDateInput.setCustomValidity("");
      lastDateInput.setCustomValidity("");
    }
  
    // Check if number of days is greater than or equal to 10
    if (daysDiff >= 10) {
      mcUploadDiv.style.display = "block";
    } else {
      mcUploadDiv.style.display = "none";
    }
  
    return isValid;
  }
  
  // Attach the dateValidate() function to the blur event of the start date and last date input fields
  document.getElementById("startdate").addEventListener("blur", dateValidate);
  document.getElementById("lastdate").addEventListener("blur", dateValidate);
  