
    function validateForm() {
      var rating = document.getElementsByName('rating');
      var description = document.getElementById('description').value;

      // check if a rating is selected
      var ratingSelected = false;
      for (var i = 0; i < rating.length; i++) {
        if (rating[i].checked) {
          ratingSelected = true;
          break;
        }
      }
      if (!ratingSelected) {
        document.getElementById('error-messages').innerHTML = '<p>Please select a rating.</p>';
        return false;
      }

      // check if description is entered
      if (description.trim() == '') {
        document.getElementById('error-messages').innerHTML = '<p>Please enter a description.</p>';
        return false;
      }

      // if all validations pass, return true to submit the form
      return true;
    }
  