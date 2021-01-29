
    <nav class="navbar navbar-dark navbar-expand-md sticky-top" style="background-color: black;">
        <a href="index.php" class="navbar-brand">
            Visual Trip
        </a>

        <!-- Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="mainNav">

            <!-- List 1 -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="users.php" class="nav-link">Users</a>
                </li>
                <li class="nav-item">
                    <a href="addPost.php" class="nav-link">Add Post</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- List 2 -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="profile.php?id=<?php echo $_SESSION['id'] ?>" class="nav-link font-weight-bold"><?= $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link btn btn-sm btn-outline-danger text-danger font-weight-bold py-2">Log out</a>
                </li>
            </ul>

        </div>
    </nav>
