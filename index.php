<?php
include 'classes/functions.php';

$photos = new functions();
$result = $photos->readPhotos();
$countries = $photos->readCountries();
// echo "<pre>";
// print_r($result);
// echo "</pre>";


?>

<!doctype html>
<html lang="en">

<head>
  <title>Visual Trip</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <?php
  if (empty($_SESSION['id'])) {
    include "mainNav.php";
  } else {
    include "userNav.php";
  }
  ?>
  <div class="container py-5">

    <h1 class="font-weight-lighter text-center text-lg-left">Where do you want to go?</h1>

    <div class="row float-right mt-4 px-3">
      <form action="action.php" method="post">
        <select name="filter" class="font-weight-light border-0" style="color: whitesmoke; background-color: black;">
          <?php
          foreach ($countries as $filter) {
            $countryID = $filter['country_id'];
            echo "<option value='$countryID'>" . $filter['country_name'] . "</option>";
          }
          ?>
        </select>
        <input type="submit" value="Go" name="btnFilter" class="t-color links btn btn-sm font-weight-light">
      </form>
    </div>
    <br>
    <br>
    <hr class="mt-3 mb-5">


    <div class="row text-center text-lg-left pt-3">

      <?php foreach ($result as $row) : ?>

        <div class="col-lg-3 col-md-4 col-6">
          <a href="destination.php?id=<?php echo $row['photo_id'] ?>" class="d-block mb-4 h-100">
            <img class="img-hover destination" src="img/<?php echo $row['photo_source'] ?>" alt="<?php echo $row['photo_name'] ?>">
          </a>
        </div>
      <?php endforeach; ?>

    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  
</body>

</html>