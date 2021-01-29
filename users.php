<?php
include 'classes/functions.php';

$users = new functions();
$result = $users->readUsers();

?>


<!doctype html>
<html lang="en">

<head>
  <title>Users</title>
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

  <div class="jumbotron jumbotron-fluid users-bg">
    <h2 class="display-4 font-weight-lighter text-center" style="color: black;">Users</h2>
  </div>

  <div class="container pb-5">

    <div class="row text-center">
      <?php foreach ($result as $row) : ?>

        <div class="col-lg-4 col-md-4 col-6">
          <a href="profile.php?id=<?php echo $row['user_id'] ?>" class="h-100 text-decoration-none">

            <?php
            if (empty($row['profile'])) {
            ?>
              <img alt="User Pic" src="img/no-user-images.png" id="profile-image1" class="d-block rounded-circle img-responsive mx-auto" width="100" height="100">
            <?php

            } else {
            ?>

              <img alt="User Pic" src="img/<?php echo $row['profile'] ?>" id="profile-image1" class="d-block rounded-circle img-responsive mx-auto" width="100" height="100" style="object-fit: cover;">
            <?php } ?>

            <h3 class="links font-weight-lighter"><?php echo $row['username'] ?></h3>

          </a>
          <br>

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