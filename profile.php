<?php
include 'classes/functions.php';

$user = new functions();
$userid = $_GET['id'];

$row = $user->readProfile($userid);
$result = $user->readUserPost($userid);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Profile</title>
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

  <div class="container py-3">

    <div class="col-lg-10 mx-auto">
      <a href="users.php" class="back text-decoration-none small text-muted font-weight-bold"><i class="fas fa-angle-left"></i> See Other Users</a>

      <div class="mt-3">
        <?php
        if (empty($row['profile'])) {
        ?>
          <img alt="User Pic" src="img/no-user-images.png" class="rounded-circle" width="100" height="100">
        <?php

        } else {
        ?>

          <img alt="User Pic" src="img/<?php echo $row['profile'] ?>" class="rounded-circle" width="100" height="100" style="object-fit: cover;">
        <?php } ?>

        <h2 class="h1 font-weight-light px-2"><?php echo $row['username'] ?>
          <a href="editUser.php?id=<?php echo $userid ?>" class="back btn btn-outline-warning btn-sm text-muted font-weight-bold float-right"><i class="fas fa-user-edit"></i> Edit</a>
        </h2>

        <hr class="mt-2 mb-5">
        <p class="t-color font-weight-light mb-5 px-2"><?php echo $row['bio'] ?></p>


      </div>

      <hr class="mt-2 mb-3">

      <div class="py-3">
        <p class="text-muted font-weight-bold"><?php echo $row['username'] ?>'s Post</p>
        <div class="row text-center">
          <?php
          if (empty($result)) {
            echo "<p class='text-danger my-4 mx-auto font-weight-bold'> No Post</p>";
          } else {
          ?>
            <?php foreach ($result as $rows) : ?>

              <div class="col-lg-3 col-md-4 col-6">
                <a href="destination.php?id=<?php echo $rows['photo_id'] ?>" class="d-block mb-4 h-100 text-decoration-none text-muted">

                  <img class="img-hover img-fluid" src="img/<?php echo $rows['photo_source'] ?>" alt="<?php echo $rows['photo_name'] ?>" style="width: 100%; height:140px; object-fit: cover;">

                  <p><?php echo $rows['photo_name'] ?></p>
                </a>
              </div>
            <?php endforeach; ?>
          <?php
          }
          ?>
        </div>


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