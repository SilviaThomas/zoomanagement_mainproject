// function vpositionValidate() {
//     var positionInput = document.getElementById("positionvalidate");
//     var positionErrorMsg = document.getElementById("position");
  
//     // Check if input is empty
//     if (positionInput.value == "") {
//       positionErrorMsg.innerHTML = "Please enter a job position";
//       return false;
//     }
  
//     // Check if input contains only letters and spaces
//     var letters = /^[a-zA-Z\s]+$/;
//     if (!positionInput.value.match(letters)) {
//       positionErrorMsg.innerHTML = "Job position can only contain letters and spaces";
//       return false;
//     }
  
//     // Check if input contains more than 5 letters
//     if (positionInput.value.replace(/\s/g, "").length < 5) {
//       positionErrorMsg.innerHTML = "Job position must contain more than 5 letters";
//       return false;
//     }
  
//     // Validation successful
//     positionErrorMsg.innerHTML = "";
//     return true;
//   }

  
//   function descValidate() {
//     var descInput = document.getElementById("vaccancy_description");
//     var descErrorMsg = document.getElementById("desc");
  
//     // Check if input is empty
//     if (descInput.value == "") {
//       descErrorMsg.innerHTML = "Please enter a job description";
//       return false;
//     }
  
//     // Check if input is less than 10 characters
//     if (descInput.value.length < 10) {
//       descErrorMsg.innerHTML = "Job description must be at least 10 characters long";
//       return false;
//     }
  
//     // Validation successful
//     descErrorMsg.innerHTML = "";
//     return true;
//   }

//   function typeValidate() {
//     var type = document.getElementById("vaccancy_type").value;
//     if (type === "") {
//         document.getElementById("type").innerHTML = "Please select a vacancy type.";
//         return false;
//     } else {
//         document.getElementById("type").innerHTML = "";
//         return true;
//     }
// }

// function dateValidate() {
//     var startDate = document.getElementById("start_date").value;
//     var today = new Date();
//     if (startDate === "") {
//         document.getElementById("date").innerHTML = "Please enter a start date.";
//         return false;
//     } else if (new Date(startDate) < today) {
//         document.getElementById("date").innerHTML = "Start date cannot be in the past.";
//         return false;
//     } else {
//         document.getElementById("date").innerHTML = "";
//         return true;
//     }
// }


//     function typeValidate() {
//         var type = document.getElementById("vaccancy_type").value;
//         if (type == "temporary") {
//             document.getElementById("end-date-field").style.display = "block";
//             document.getElementById("end_date").setAttribute("required", "");
//         } else {
//             document.getElementById("end-date-field").style.display = "none";
//             document.getElementById("end_date").removeAttribute("required");
//         }
//     }

//     function dateValidate() {
//         var start_date = new Date(document.getElementById("start_date").value);
//         var end_date = new Date(document.getElementById("end_date").value);
//         if (end_date < start_date) {
//             document.getElementById("end-date").innerHTML = "Contract end date should be after contract start date";
//             return false;
//         } else {
//             document.getElementById("end-date").innerHTML = "";
//             return true;
//         }
//     }


  function vpositionValidate() {
    var vposition = document.getElementById("positionvalidate").value;
    var positionPattern = /^[a-zA-Z\s]+$/;
    if (vposition == "") {
      document.getElementById("position").innerHTML = "Please enter the position";
      return false;
    }
    else if (!vposition.match(positionPattern)) {
      document.getElementById("position").innerHTML = "Position must contain only letters";
      return false;
    }
    else {
      document.getElementById("position").innerHTML = "";
      return true;
    }
  }

  function descValidate() {
    var description = document.getElementById("vaccancy_description").value;
    if (description == "") {
      document.getElementById("desc").innerHTML = "Please enter the description";
      return false;
    }
    else {
      document.getElementById("desc").innerHTML = "";
      return true;
    }
  }

  function typeValidate() {
    var type = document.getElementById("vaccancy_type").value;
    if (type == "") {
      document.getElementById("type").innerHTML = "Please select the vacancy type";
      return false;
    }
    else {
      document.getElementById("type").innerHTML = "";
      return true;
    }
  }

  function dateValidate() {
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;
    var todayDate = new Date();
    var startDateObj = new Date(startDate);
    var endDateObj = new Date(endDate);

    if (startDate == "") {
      document.getElementById("date").innerHTML = "Please select the start date";
      return false;
    }
    else if (endDate != "" && endDateObj < startDateObj) {
      document.getElementById("end-date").innerHTML = "End date must be greater than start date";
      return false;
    }
    else if (startDateObj < todayDate) {
      document.getElementById("date").innerHTML = "Start date must be greater than or equal to today's date";
      return false;
    }
    else {
      document.getElementById("date").innerHTML = "";
      document.getElementById("end-date").innerHTML = "";
      if (document.getElementById("vaccancy_type").value == "temporary") {
        document.getElementById("end-date-field").style.display = "block";
      }
      else {
        document.getElementById("end-date-field").style.display = "none";
      }
      return true;
    }
  }

  document.getElementById("start-date-field").addEventListener("change", function() {
    dateValidate();
  });
  document.getElementById("end-date-field").addEventListener("change", function() {
    dateValidate();
  });

