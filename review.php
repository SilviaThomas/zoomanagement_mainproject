.star {
  font-size: 30px;
  color: #ccc;
  cursor: pointer;
}

.star:hover,
.star:hover ~ .star {
  color: #ffcc00;
}

input[type="radio"] {
  display: none;
}

input[type="radio"]:checked ~ .star {
  color: #ffcc00;
}

<form action="process-rating.php" method="post">
  <label>
    <input type="radio" name="rating" value="1">
    <span class="star">&#9733;</span>
  </label>
  <label>
    <input type="radio" name="rating" value="2">
    <span class="star">&#9733;</span>
  </label>
  <label>
    <input type="radio" name="rating" value="3">
    <span class="star">&#9733;</span>
  </label>
  <label>
    <input type="radio" name="rating" value="4">
    <span class="star">&#9733;</span>
  </label>
  <label>
    <input type="radio" name="rating" value="5">
    <span class="star">&#9733;</span>
  </label>
  <input type="submit" value="Submit Rating">
</form>

