function ticketGroupValidate() {
    var ticketGroup = document.getElementById("class_display_name").value;
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(ticketGroup)) {
      document.getElementById("ticketvalidate").innerHTML = "";
      return true;
    } else {
      document.getElementById("ticketvalidate").innerHTML = "Please enter a valid Ticket Group name (letters and spaces only)";
      return false;
    }
  }
  
  function ticketpriceValidate() {
    var ticketPrice = document.getElementById("class_display_name").value;
    var regex = /^\d+$/;
    if (regex.test(ticketPrice)) {
      document.getElementById("pricevalidate").innerHTML = "";
      return true;
    } else {
      document.getElementById("pricevalidate").innerHTML = "Please enter a valid price (numeric values only)";
      return false;
    }
  }
  