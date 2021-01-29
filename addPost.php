<?php
include 'classes/functions.php';

if (!$_SESSION['id']) {
  header("location: logout.php");
  exit;
}


$country = new functions();
$result = $country->readCountries();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Add Post</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <?php include "userNav.php"; ?>

  <div class="jumbotron jumbotron-fluid addPost-bg">
    <h2 class="display-4 font-weight-lighter text-center">Create New Post</h2>
  </div>

  <div class="container pb-5">
    <div class="w-50 mx-auto mt-3 px-4 text-right">
      <a href="addCountry.php" class="btn btn-sm btn-outline-success font-weight-bold text-muted"><i class="fas fa-flag"></i> Add Country</a>
    </div>

    <div class="card w-50 mx-auto mt-3" style="background-color: black;">


      <div class="card-body pt-0">
        <form action="action.php" method="post" enctype="multipart/form-data">

          <label for="photoSource" class="text-light">Choose Photo</label>
          <input type="file" name="photoSource" id="photoSource" class="text-light small mb-3" required>
          <br>

          <label for="photoName" class="text-light">Name</label>
          <input type="text" name="photoName" id="photoName" class="form-control mb-3" autofocus required>

          <label for="photoCountry" class="text-light">Country Name</label>
          <select name="photoCountry" id="photoCountry" class="form-control mb-3" required>
            <option value="" hidden>Choose Country</option>
            <?php
            foreach ($result as $row) {
              echo "<option value ='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
            }
            ?>
          </select>

          <label for="photoCity" class="text-light">City</label>
          <input type="text" name="photoCity" id="photoCity" class="form-control mb-3" required>

          <label for="photoDescription" class="text-light">Desctiption</label>
          <textarea name="photoDescription" id="photoDescription" cols="30" rows="10" class="form-control mb-3" placeholder="Description" required></textarea>

          <label for="date" class="text-light">Date</label>
          <input type="date" name="date" id="date" class="form-control mb-4" required>

          <button type="submit" name="btnAddPost" class="btn btn-outline-primary btn-block ntm-sm float-right">Create Post</button>
        </form>

      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>