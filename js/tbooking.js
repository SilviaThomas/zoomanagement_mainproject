function adultValidate() {
    var adultInput = document.getElementById("adult");
    var adultPriceInput = document.getElementById("adult_price");
    var adultValidationMsg = document.getElementById("adultvalidate");
    
    if (isNaN(adultInput.value) || adultInput.value < 1 || adultInput.value > 10) {
      adultValidationMsg.innerHTML = "Please enter a valid number of adults (minimum 1, maximum 10)";
      adultInput.style.border = "2px solid red";
      adultPriceInput.value = "";
      return false;
    } else {
      adultValidationMsg.innerHTML = "";
      adultInput.style.border = "none";
      return true;
    }
  }

  
  function studentValidate() {
    var studentInput = document.getElementById("student");
    var studentPriceInput = document.getElementById("student_price");
    var studentValidationMsg = document.getElementById("childvalidate");
    
    if (isNaN(studentInput.value) || studentInput.value < 1 || studentInput.value > 10) {
      studentValidationMsg.innerHTML = "Please enter a valid number of students (minimum 1, maximum 10)";
      studentInput.style.border = "2px solid red";
      studentPriceInput.value = "";
      return false;
    } else {
      studentValidationMsg.innerHTML = "";
      studentInput.style.border = "none";
      return true;
    }
  }

  
  function childValidate() {
    var childInput = document.getElementById("child");
    var childPriceInput = document.getElementById("child_price");
    var childValidationMsg = document.getElementById("cvalidate");
    
    if (isNaN(childInput.value) || childInput.value < 1 || childInput.value > 10) {
      childValidationMsg.innerHTML = "Please enter a valid number of children (minimum 1, maximum 10)";
      childInput.style.border = "2px solid red";
      childPriceInput.value = "";
      return false;
    } else {
      childValidationMsg.innerHTML = "";
      childInput.style.border = "none";
      return true;
    }
  }

  function dateValidate() {
    var dateInput = document.getElementById("date");
    var dateValidationMsg = document.getElementById("datevalidate");
    
    // Get the selected date and format it to match the database date format
    var selectedDate = new Date(dateInput.value);
    var formattedDate = selectedDate.toISOString().slice(0,10);
    
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    
    // Define the URL and set the request method to POST
    var url = "check_availability.php";
    xhr.open("POST", url, true);
    
    // Set the request header to send the data in JSON format
    xhr.setRequestHeader("Content-type", "application/json");
    
    // Define the callback function to handle the response
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        
        // Check if the number of bookings for the selected date is less than 10
        if (response.bookings < 2) {
          dateValidationMsg.innerHTML = "";
          dateInput.style.border = "none";
          return true;
        } else {
          dateValidationMsg.innerHTML = "Sorry, maximum bookings per day is 10. Please select a different date.";
          dateInput.style.border = "2px solid red";
          return false;
        }
      }
    };
    
    // Send the request with the selected date
    xhr.send(JSON.stringify({date: formattedDate}));
  }
  