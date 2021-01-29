<?php

include 'database.php';
session_start();


class functions extends database
{

    public function login($username, $password)
    {
        $conn = $this->conn;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                session_start();

                $_SESSION['id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];

                header('location: dashboard.php');
            } else {
                echo "<p class='text-danger'>Incorrect password.</p>";
            }
        } else {
            echo "<p class='text-danger'>Username not found.</p>";
        }
    }

    public function createUser($fName, $lName, $user, $passw)
    {
        $conn = $this->conn;
        $passw = password_hash($passw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(first_name, last_name, username, `password`) VALUES ('$fName', '$lName', '$user', '$passw')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            header('location: login.php');
        } else {
            die("ERROR" . $conn->error);
        }
    }


    //////////////   functions for country table   ///////////////

    public function createCountry($country)
    {
        $conn = $this->conn;
        $sql = "INSERT INTO countries(country_name) VALUES ('$country')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            header('location: addPost.php');
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function readCountries()
    {
        $sql = "SELECT * FROM countries ORDER BY country_name";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
            return $row;
        } else {
            echo "<div class= 'alert alert-warning'>NO DATA ADDED</div>";
        }
    }

    public function filterCountry($countryID)
    {
        $sql = "SELECT * FROM photos WHERE country_id = '$countryID'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }

            header("Location: country.php?id=$countryID");
        } else {
            header("Location: countryNoPhoto.php?id=$countryID");
        }
    }

    public function readACountry($countryID)
    {
        $sql = "SELECT * FROM countries WHERE country_id = '$countryID'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "<div class= 'alert alert-warning'>NO DATA ADDED</div>";
        }
    }



    //////////////   functions for photos table   ///////////////


    public function createPost($photo, $pName, $pCity, $pDesc, $pDate, $userID, $countryID)
    {
        $conn = $this->conn;
        $pName = $conn->real_escape_string($pName);
        $pCity = $conn->real_escape_string($pCity);
        $pDesc = $conn->real_escape_string($pDesc);
        $sql = "INSERT INTO photos(photo_source, photo_name, photo_city, photo_description, date_posted, `user_id`, country_id) VALUES ('$photo', '$pName', '$pCity', '$pDesc', '$pDate', '$userID', '$countryID')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            $destination = "img/" . basename($photo);

            if (move_uploaded_file($_FILES['photoSource']['tmp_name'], $destination)) {
                header('location: index.php');
            } else {
                die("ERROR" . $conn->error);
            }
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function readPhotos()
    {
        $sql = "SELECT * FROM photos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
            return $row;
        } else {
            echo "<div class= 'alert alert-warning'>NO DATA ADDED</div>";
        }
    }

    public function readDest($id)
    {
        $sql = "SELECT photos.photo_id, photos.photo_source, photos.photo_name, photos.photo_city, photos.photo_description, photos.date_posted, users.username, countries.country_id, countries.country_name, users.user_id
        FROM photos
        INNER JOIN users
        ON photos.user_id = users.user_id
        INNER JOIN countries
        ON photos.country_id = countries.country_id
        WHERE `photo_id` = '$id'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "<div class= 'alert alert-warning'>NO DATA ADDED</div>";
        }
    }

    public function readCountryPhotos($countryID)
    {
        $sql = "SELECT * FROM photos
        INNER JOIN countries
        ON photos.country_id = countries.country_id
        WHERE countries.country_id = '$countryID'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
            return $row;
        } else {
            echo "aaa";
        }
    }

    public function readUpdats()
    {
        $conn = $this->conn;
        $sql = "SELECT photos.photo_id, photos.photo_source, photos.photo_name, photos.date_posted, users.username
        FROM photos
        INNER JOIN users
        ON photos.user_id = users.user_id
        ORDER BY photos.date_posted DESC
        LIMIT 5";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }

            return $row;
        } else {
            die("ERROR" . $conn->error);
        }
    }



    //////////////   functions for users table   ///////////////
    public function readProfile($userid)
    {
        $conn = $this->conn;
        $sql = "SELECT * FROM users
        WHERE `user_id` = '$userid'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function readUserPost($userid)
    {
        $sql = "SELECT * FROM photos
        WHERE `user_id` = '$userid'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
            return $row;
        } else {
            echo "";
        }
    }

    public function readUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
            return $row;
        } else {
            echo "<div class= 'alert alert-warning'>NO DATA ADDED</div>";
        }
    }

    public function updateUser($userid, $fName, $lName, $user, $bio)
    {
        $conn = $this->conn;
        $bio = $conn->real_escape_string($bio);
        $sql = "UPDATE users SET first_name = '$fName', last_name = '$lName', username = '$user', bio = '$bio' WHERE `user_id` = '$userid'";
        $result = $this->conn->query($sql);


        if ($result == TRUE) {
            header("Location: profile.php?id=$userid");
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function updateImage($userid, $image)
    {
        $conn = $this->conn;
        $sql = "UPDATE users SET `profile` = '$image' WHERE `user_id` = '$userid'";
        $result = $this->conn->query($sql);


        if ($result == TRUE) {
            $destination = "img/" . basename($image);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                header("Location: profile.php?id=$userid");
            } else {
                die("ERROR" . $conn->error);
            }
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function deleteUser($userid)
    {
        $conn = $this->conn;
        $sql = "DELETE FROM users WHERE `user_id` = '$userid'";
        $result = $this->conn->query($sql);

        if ($_SESSION['id'] == $userid) {

            if ($result == TRUE) {
                header("Location: logout.php");
            } else {
                die("ERROR" . $conn->error);
            }
        } else {
            echo "<div class= 'alert alert-warning'>You cannot delete other users</div>";
        }
    }
    public function deleteUserPost($userid)
    {
        $conn = $this->conn;
        $sql = "DELETE FROM photos WHERE `user_id` = '$userid'";
        $result = $this->conn->query($sql);

        if ($_SESSION['id'] == $userid) {

            if ($result == TRUE) {
                header("Location: logout.php");
            } else {
                die("ERROR" . $conn->error);
            }
        } else {
            echo "<div class='alert alert-warning'>You cannot delete other users posts</div>";
        }
    }

    public function updatePhoto($photoid, $image)
    {
        $conn = $this->conn;
        $sql = "UPDATE photos SET photo_source = '$image' WHERE photo_id = '$photoid'";
        $result = $this->conn->query($sql);

        if ($result == TRUE) {
            $destination = "img/" . basename($image);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                header("Location: destination.php?id=$photoid");
            } else {
                die("ERROR" . $conn->error);
            }
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function updatePost($photoid, $pName, $pCountry, $pCity, $pDesc)
    {
        $conn = $this->conn;
        $pName = $conn->real_escape_string($pName);
        $pCity = $conn->real_escape_string($pCity);
        $pDesc = $conn->real_escape_string($pDesc);
        $sql = "UPDATE photos SET photo_name = '$pName', photo_city = '$pCity', photo_description = '$pDesc', country_id = '$pCountry' WHERE photo_id = '$photoid'";
        $result = $this->conn->query($sql);

        if ($result == TRUE) {
            header("Location: destination.php?id=$photoid");
        } else {
            die("ERROR" . $conn->error);
        }
    }
    public function deletePost($photoid)
    {
        $sql = "DELETE FROM photos WHERE `photo_id` = '$photoid'";
        $result = $this->conn->query($sql);

        if ($result == TRUE) {
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-warning'>You cannot delete other users post</div>";
        }
    }

    //////////////   functions for comment table   ///////////////


    public function comment($photoid, $userid, $comment)
    {
        $conn = $this->conn;
        $comment = $conn->real_escape_string($comment);
        $sql = "INSERT INTO comments(comment, `user_id`, photo_id) VALUES ('$comment', '$userid', '$photoid')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            header("Location: destination.php?id=$photoid");
        } else {
            die("ERROR" . $conn->error);
        }
    }

    public function readComments($id)
    {
        $conn = $this->conn;
        $sql = "SELECT * FROM photos INNER JOIN comments ON photos.photo_id = comments.photo_id 
        INNER JOIN users ON users.user_id = comments.user_id
        WHERE photos.photo_id = '$id'";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = array();

            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
            return $row;
        } else {
            echo "";
        }

    }

    public function deleteComment($commentID, $photoID)
    {
        $sql = "DELETE FROM comments WHERE `comment_id` = '$commentID'";
        $result = $this->conn->query($sql);

        if ($result == TRUE) {
            header("Location: destination.php?id=$photoID");
        } else {
            echo "<div class='alert alert-warning'>You cannot delete other users post</div>";
        }
    }

    //////////////   functions for contact table   ///////////////


    public function contact($fName, $lName, $username, $email, $message)
    {
        $conn = $this->conn;
        $message = $conn->real_escape_string($message);
        $sql = "INSERT INTO contact(first_name, last_name, username, email, content) VALUES ('$fName', '$lName', '$username', '$email', '$message')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            header('location: recieved.php');
        } else {
            die("ERROR" . $conn->error);
        }
    }

}
