<?php

?>

<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-8 col-lg-4 mx-auto">

                <div class="card" style="background-color: black;">
                    <div class="card-header">
                        <h2 class="card-title h3 text-center font-weight-light">Sign Up</h2>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="post">

                            <label for="firstName">First name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control mb-3" autofocus required>

                            <label for="lastName">Last name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control mb-3" required>

                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control mb-3" maxlength="15" required>

                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control mb-3" required>

                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control mb-4" required>

                            <button type="submit" class="btn btn-outline-light btn-block" name="btnSignUp">Sign Up</button>
                        </form>

                        <div class="text-center mt-4 mb-3">
                            <a href="login.php" class="links text-decoration-none small text-light">Log In</a>
                        </div>
                    </div>
                </div>
                <div class="w-25 mx-auto">
                    <a href="index.php" class="back text-decoration-none small font-weight-bold text-muted px-3 py-4"><i class="fas fa-angle-left"></i> Go to main page</a>

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