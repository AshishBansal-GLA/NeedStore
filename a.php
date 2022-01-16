<head>
  <link rel="stylesheet" href="ashishstyle.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <script src='ashish.js'></script>
</head>


<?php

include 'connect.php';

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $cat = $_POST['option'];
  $price = $_POST['price'];
  $filename = $_FILES['file']['name'];
  $filetmp = $_FILES['file']['tmp_name'];
  $destination = "images/";
  $sql = "INSERT INTO 'products'(product_name, product_cat, price, image) VALUES ('$title', $cat, $price, '$filename')";

  if (mysqli_query($connect, $sql)) {
    echo "

    <script>
    alert('successfully added');
     </script>";
    move_uploaded_file($filetmp, $destination.$filename);
  }
}

?>
    <div class="col-1">
                <button class='open-button' onclick='openForm()'><img src='add.png' class="image"></button>
                <div class="form-popup" id="myForm">
                  <form class="form-container" method="post" enctype="multipart/form-data">
                    <h1 style="text-align:center;" class="text-danger">New Item</h1>
                    <div class="input-group mb-3">
                      <span class="input-group-text">Title name</span>
                      <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text">Product Category</span>
                      <select class="form-select" aria-label="Default select example" name="option" required>
                        <option selected disabled>Open this select menu</option>
                        <option value="1">T shirt</option>
                        <option value="2">Gym</option>
                        <option value="3">Pants</option>
                        <option value="4">Socks</option>
                        <option value="5">Foods</option>
                        <option value="7">Watch</option>

                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text">Price</span>
                      <span class="input-group-text">0.00</span>
                      <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text">upload</span>
                      <input type="file" id="file" name="file" class="form-control" onchange="return fileval()" required>
                    </div>
                    <button type="submit" name="submit" class="btn">ADD ITEM</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

                  </form>
                </div>
</div>
