<?php
include 'classes/functions.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Contact</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="contact">
    <?php
    if (empty($_SESSION['id'])) {
        include "mainNav.php";
    } else {
        include "userNav.php";
    }
    ?>
    <div class="jumbotron jumbotron-fluid contact-bg">
        <h2 class="display-4 font-weight-lighter text-center">Contact Form</h2>
    </div>
    <div class="container pb-5">
        <div class="card w-50 mx-auto" style="background-color: black;">

            <div class="card-body">
                <form action="action.php" method="post">

                    <label for="firstName" class="text-light">First name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control mb-3" autofocus required>

                    <label for="lastName" class="text-light">Last name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control mb-3" required>

                    <label for="username" class="text-light">Username(If you have an account)</label>
                    <input type="text" name="username" id="username" class="form-control mb-3" maxlength="15">

                    <label for="email" class="text-light">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control mb-3" required>

                    <label for="content" class="text-light">Message</label>
                    <textarea name="content" id="content" class="form-control mb-5" cols="30" rows="10" placeholder="Enter here" required></textarea>

                    <button type="submit" class="btn btn-outline-light btn-block" name="btnSubmitMessage">Submit</button>
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