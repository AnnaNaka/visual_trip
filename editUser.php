<?php

include 'classes/functions.php';

if (!$_SESSION['id']) {
    header("location: logout.php");
    exit;
}

$user = new functions();
$userid = $_GET['id'];

$row = $user->readProfile($userid);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Edit User</title>
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
    <div class="jumbotron jumbotron-fluid editUser-bg">
        <h2 class="display-4 text-center" style="color: black;">Edit User: <?php echo $row['username'] ?></h2>
    </div>

    <div class="container mb-5">

        <div class="row">

            <div class="col-6 col-lg-4">
                <div class="card" style="background-color: black;">
                    <div class="card-body">
                        <form action="action.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="userID" value="<?= $row['user_id'] ?>">
                            <label for="image">Update Image</label>
                            <p class="small text-center text-light mt-2 mb-3">Current Image <img src="img/<?php echo $row['profile'] ?>" class="img-circle img-responsive" height="140"></p>
                            <input type="file" name="image" id="image" class="mb-2 text-light small" required>

                            <button type="submit" class="btn btn-outline-warning btn-block px-5 mb-3 float-right" name="btnEditImage">Save</button>

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

                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control mb-3" value="<?php echo $row['first_name'] ?>" required>

                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control mb-3" value="<?php echo $row['last_name'] ?>" required>

                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control mb-3" value="<?php echo $row['username'] ?>" maxlength="15" required>

                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio" cols="30" rows="10" class="form-control mb-4"><?php echo $row['bio'] ?></textarea>

                            <button type="submit" class="btn btn-outline-warning btn-block mb-4" name="btnEditUser">Save</button>

                            <a href="profile.php?id=<?php echo $row['user_id'] ?>" class="btn btn-outline-secondary btn-sm mr-4">Cancel</a>
                            <button type="button" class="btn btn-outline-danger btn-sm float-right" data-toggle="modal" data-target="#testModal">Remove</button>

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
                        <label>Do you want to remove this user?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

                        <a href="deleteUser.php?id=<?php echo $row['user_id'] ?>" class="btn btn-danger">Remove</a>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>