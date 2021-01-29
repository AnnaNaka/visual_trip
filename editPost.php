<?php

include 'classes/functions.php';

if (!$_SESSION['id']) {
    header("location: logout.php");
    exit;
}

$content = new functions();
$userid = $_SESSION['id'];
$id = $_GET['id'];

$row = $content->readDest($id);
$result = $content->readCountries();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Edit Post</title>
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
    <div class="jumbotron jumbotron-fluid editPost-bg">
        <h2 class="display-4 text-center">Edit Post</h2>
    </div>

    <div class="container mb-5">
        <div class="row">

            <div class="col-6 col-lg-4">
                <div class="card" style="background-color: black;">
                    <div class="card-body">
                        <form action="action.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="userID" value="<?= $row['user_id'] ?>">
                            <input type="hidden" name="photoID" value="<?= $row['photo_id'] ?>">
                            <label for="image">Update Photo</label>
                            <p class="small text-center mt-2 mb-3" style="color: whitesmoke;">Current Photo: <img src="img/<?php echo $row['photo_source'] ?>" class="img-circle img-responsive" height="140"></p>
                            <input type="file" name="image" id="image" class="mt-2 mb-4 small" style="color: whitesmoke;">

                            <button type="submit" class="btn btn-outline-info btn-block mb-3" name="btnEditPhoto">Change</button>

                        </form>
                    </div>
                    <!--card-body-->
                </div>
                <!--card-->
            </div>
            <!--col-->

            <div class="col-6 col-lg-4">
                <div class="card" style="background-color: black;">
                    <div class="card-body">
                        <form action="action.php" method="post">
                            <input type="hidden" name="userID" value="<?= $row['user_id'] ?>">
                            <input type="hidden" name="photoID" value="<?= $row['photo_id'] ?>">

                            <label for="photoName">Name</label>
                            <input type="text" name="photoName" id="photoName" class="form-control mb-3" value="<?php echo $row['photo_name'] ?>" required>

                            <label for="photoCountry">Country</label>
                            <select name="photoCountry" id="photoCountry" class="form-control mb-2" required>
                                <option value="" hidden>Choose Country</option>
                                <?php
                                foreach ($result as $country) {

                                    if ($row['country_id'] == $country['country_id']) {
                                        echo "<option selected value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $country['country_id'] . "'>" . $country['country_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>

                            <label for="photoCity">City</label>
                            <input type="text" name="photoCity" id="photoCity" class="form-control mb-3" value="<?php echo $row['photo_city'] ?>" required>

                            <label for="photoDescription">Desctiption</label>
                            <textarea name="photoDescription" id="photoDescription" cols="30" rows="10" class="form-control mb-4"><?php echo $row['photo_description'] ?></textarea>

                            <button type="submit" class="btn btn-outline-info btn-block mb-4" name="btnEditPost">Save</button>

                            <a href="destination.php?id=<?php echo $row['photo_id'] ?>" class="btn btn-outline-secondary btn-sm">Cancel</a>
                            <button type="button" class="btn btn-outline-danger btn-sm float-right" data-toggle="modal" data-target="#testModal">Delete</button>


                        </form>
                    </div>
                    <!--card-body-->
                </div>
                <!--card-->
            </div>
            <!--col-->

        </div>
        <!--row-->



        <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: black;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Are you sure?
                        </h4>
                    </div>
                    <div class="modal-body">
                        <label>Do you want to delete this post?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                        <form action="action.php" method="post">
                            <input type="hidden" name="userID" value="<?= $row['user_id'] ?>">

                            <input type="hidden" name="photoID" value="<?= $row['photo_id'] ?>">

                            <button type="submit" class="btn btn-danger" name="btnDeletePost">Delete</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>

</html>