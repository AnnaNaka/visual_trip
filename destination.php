<?php
include 'classes/functions.php';

$photo = new functions();
$id = $_GET['id'];

$row = $photo->readDest($id);
$result = $photo->readComments($id);

// echo "<pre>";
// print_r($result);
// die();
// echo "</pre>";


?>

<!doctype html>
<html lang="en">

<head>
  <title>Destination (<?= $row['photo_name'] ?>)</title>
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

    <a href="index.php" class="back text-decoration-none small text-muted font-weight-bold"><i class="fas fa-angle-left"></i> See All</a>
    <br>

    <h2 class="h1 font-weight-lighter mt-4 mb-0"><?php echo $row['photo_name'] ?>
      <a href="editPost.php?id=<?php echo $row['photo_id'] ?>" class="back btn btn-outline-info btn-sm text-muted font-weight-bold float-right"><i class="far fa-edit"></i> Edit</a>
    </h2>
    <p class="font-weight-light my-2 text-decoration-none text-muted mb-0 d-inline">Author:
      <a href="profile.php?id=<?php echo $row['user_id'] ?>" class="t-color links text-decoration-none">
        <?php echo $row['username'] ?></a>
    </p>
    <p class="font-weight-light text-muted d-inline float-right"><?php echo $row['date_posted'] ?></p>


    <hr class="mt-3 mb-4">

    <div class="row">
      <div class="col-lg-7 col-md-9 col-12">
        <div href="#" class="d-block mb-4 h-100">
          <img class="img-fluid" src="img/<?php echo $row['photo_source'] ?>" alt="<?php echo $row['photo_name'] ?>">
        </div>
      </div>
    </div>

    <h3 class="h4 font-weight-lighter text-left"><?php echo $row['photo_city'] ?>, <?php echo $row['country_name'] ?></h3>
    <p class="t-color col-lg-7 col-md-9 col-12 font-weight-lighter mt-3 mb-5 px-0 h6"><?php echo $row['photo_description'] ?></p>

    <hr>



    <h4 class="h5 font-weight-lighter mt-4 mb-0">Comments</h4>


    <div class="col-lg-7 col-md-9 col-12 my-5" style="background-color: black;">
      <hr>
      <?php
      if (empty($result)) {
        echo "<p class='text-danger my-4 mx-auto font-weight-bold'> No Comments</p>";
      } else {
      ?>

        <?php foreach ($result as $comment) : ?>

          <a href="profile.php?id=<?php echo $comment['user_id'] ?>" class="t-color links text-decoration-none small font-weight-bold float-right">
            - <?php echo $comment['username'] ?>
          </a>

          <p class="t-color font-weight-lighter"><?php echo $comment['comment'] ?></p>

          <form action="action.php" method="post">
            <input type="hidden" name="userID" value="<?= $comment['user_id'] ?>">

            <input type="hidden" name="commentID" value="<?= $comment['comment_id'] ?>">

            <input type="hidden" name="photoID" value="<?= $comment['photo_id'] ?>">

            <button type="submit" class="btn btn-outline-danger btn-sm float-right" name="btnDeleteComment">Delete</button>

          </form>
          <br>

          <hr>

        <?php endforeach; ?>
      <?php
      }
      ?>



      <form action="action.php" method="post">
        <?php
        if (empty($_SESSION['id'])) {
        ?>
          <p class="t-color small text-center mt-3">You can leave comments after login</p>
        <?php
        } else {
        ?>

          <input type="hidden" name="userID" value="<?= $_SESSION['id'] ?>">
          <input type="hidden" name="photoID" value="<?= $row['photo_id'] ?>">

          <label for="comment" class="small font-weight-light">Add Comment</label>
          <textarea name="comment" id="comment" cols="30" rows="2" class="form-control mb-3" required></textarea>
          <button type="submit" name="btnComment" class="btn btn-sm btn-outline-primary float-right">submit</button>

        <?php
        }
        ?>
      </form>
    </div>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>