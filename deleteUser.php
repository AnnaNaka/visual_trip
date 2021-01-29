<?php

include 'classes/functions.php';

$user = new functions();
$userid = $_GET['id'];

$result = $user->deleteUser($userid);
$result = $user->deleteUserPost($userid);

?>
