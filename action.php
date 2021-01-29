<?php
include 'classes/functions.php';
$funcObj = new functions;

if (isset($_POST['btnLogIn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $funcObj->login($username, $password);
} elseif (isset($_POST['btnSignUp'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $user = $_POST['username'];
    $passw = $_POST['password'];
    $confirmPassw = $_POST['confirmPassword'];

    if ($passw == $confirmPassw) {
        $funcObj->createUser($fName, $lName, $user, $passw);
    } else {
        echo "<p class='text-danger'>Passsword and Confirm Password does not match.</p>";
    }
} elseif (isset($_POST['btnAddCountry'])) {
    $country = $_POST['country'];

    $funcObj->createCountry($country);
} elseif (isset($_POST['btnAddPost'])) {
    $photo = $_FILES['photoSource']['name'];
    $pName = $_POST['photoName'];
    $countryID = $_POST['photoCountry'];
    $pCity = $_POST['photoCity'];
    $pDesc = $_POST['photoDescription'];
    $pDate = $_POST['date'];
    $userID = $_SESSION['id'];

    $funcObj->createPost($photo, $pName, $pCity, $pDesc, $pDate, $userID, $countryID);
} elseif (isset($_POST['btnFilter'])) {
    $countryID = $_POST['filter'];

    $funcObj->filterCountry($countryID);
} elseif (isset($_POST['btnEditUser'])) {
    $userid = $_POST['userID'];

    if ($_SESSION['id'] == $userid) {
        $userid = $_POST['userID'];
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $user = $_POST['username'];
        $bio = $_POST['bio'];

        $funcObj->updateUser($userid, $fName, $lName, $user, $bio);
    } else {
        echo "<div class= 'alert alert-warning'>You cannot edit other users</div>";
    }
} elseif (isset($_POST['btnEditImage'])) {
    $userid = $_POST['userID'];

    if ($_SESSION['id'] == $userid) {
        $image = $_FILES['image']['name'];

        $funcObj->updateImage($userid, $image);
    } else {
        echo "<div class= 'alert alert-warning'>You cannot edit other users</div>";
    }
} elseif (isset($_POST['btnEditPhoto'])) {
    $userid = $_POST['userID'];
    $photoid = $_POST['photoID'];

    if ($userid == $_SESSION['id']) {
        $image = $_FILES['image']['name'];

        $funcObj->updatePhoto($photoid, $image);
    } else {
        echo "<div class= 'alert alert-warning'>You cannot edit other users' Post</div>";
    }
} elseif (isset($_POST['btnEditPost'])) {
    $userid = $_POST['userID'];

    if ($_SESSION['id'] == $userid) {
        $photoid = $_POST['photoID'];
        $pName = $_POST['photoName'];
        $pCountry = $_POST['photoCountry'];
        $pCity = $_POST['photoCity'];
        $pDesc = $_POST['photoDescription'];

        $funcObj->updatePost($photoid, $pName, $pCountry, $pCity, $pDesc);
    } else {
        echo "<div class= 'alert alert-warning'>You cannot edit other users' post</div>";
    }
} elseif (isset($_POST['btnDeletePost'])) {
    $userid = $_POST['userID'];
    $photoid = $_POST['photoID'];

    if ($_SESSION['id'] == $userid) {
        $photoid = $_POST['photoID'];

        $funcObj->deletePost($photoid);
    } else {
        echo "<div class= 'alert alert-warning'>You cannot delete other users' Post</div>";
    }
} elseif (isset($_POST['btnSubmitMessage'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['content'];

    $funcObj->contact($fName, $lName, $username, $email, $message);
} elseif (isset($_POST['btnComment'])) {

        $userid = $_POST['userID'];
        $photoid = $_POST['photoID'];
        $comment = $_POST['comment'];

        $funcObj->comment($photoid, $userid, $comment);

} elseif (isset($_POST['btnDeleteComment'])) {
    $userid = $_POST['userID'];
    $commentID = $_POST['commentID'];
    $photoID = $_POST['photoID'];


    if ($_SESSION['id'] == $userid) {
    $commentID = $_POST['commentID'];
    $photoID = $_POST['photoID'];

        $funcObj->deleteComment($commentID, $photoID);
    } else {
        echo "<div class= 'alert alert-warning'>You cannot delete other users' comment</div>";
    }
}
