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
    <title>Add Country</title>
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
    <div class="jumbotron jumbotron-fluid addCountry-bg">
        <h2 class="display-4 font-weight-lighter text-center">Add Country</h2>
    </div>
    <div class="container pb-5">

        <div class="card w-25 mx-auto" style="background-color: black;">
            <div class="card-body pt-0">
                <form action="action.php" method="post">
                    <label for="country" class="text-light">Country Name</label>
                    <input type="text" name="country" id="country" class="form-control mb-4" autofocus required>

                    <button type="submit" name="btnAddCountry" class="btn btn-outline-success btn-block btn-sm float-right">Add</button>
                </form>
            </div>
        </div>

        <div class="container w-25 pt-5">
            <h2 class="h4">Country List</h2>

            <table class="t-color table table-sm">
                <thead>
                    <tr class="small">
                        <th>Country</th>
                        <th>ID#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['country_name'] . "</td>";
                        echo "<td>" . $row['country_id'] . "</td>";
                        echo "</tr>";
                    }
                    ?>

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