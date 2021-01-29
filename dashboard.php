<?php
include 'classes/functions.php';

if (!$_SESSION['id']) {
  header("location: logout.php");
  exit;
}

$updates = new functions();
$result = $updates->readUpdats();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Dashboard</title>
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
  <div class="container py-5">
    <div class="row">
      <div class="col-6">
        <a href="users.php" class="btn btn-lg btn-outline-danger btn-block py-4 mb-2"><i class="fas fa-users"></i> See All Users</a>
      </div>
      <div class="col-6">
        <a href="addPost.php" class="btn btn-lg btn-outline-primary btn-block py-4 mb-2"><i class="fas fa-pencil-alt"></i> Add Post</a>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
      <a href="addCountry.php" class="btn btn-lg btn-outline-success btn-block py-4"><i class="fas fa-flag"></i> Add Country</a>
      </div>

      <div class="col-6">
      <a href="profile.php?id=<?php echo $_SESSION['id'] ?>" class="btn btn-lg btn-outline-warning btn-block py-4"><i class="fas fa-user"></i> My Profile</a>
      </div>

    </div>


    <div class="container py-4">
      <h2 class="h3 font-weight-lighter py-3">Latest Posts</h2>

      <table class="t-color table table-sm font-weight-light">
        <thead>
          <tr>
            <th>Date</th>
            <th>User</th>
            <th>Place</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) : ?>
            <tr>
              <td><?php echo $row['date_posted'] ?></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['photo_name'] ?></td>
              <td class="py-2">
                <a href="destination.php?id=<?php echo $row['photo_id'] ?>">
                  <img src='img/<?php echo $row['photo_source'] ?>' class='img-hover img-fluid' style="width: 250px; height:120px; object-fit: cover;">
                </a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>