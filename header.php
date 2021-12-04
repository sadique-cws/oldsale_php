<nav class="navbar navbar-expand-lg navbar-dark bg-brown">
    <div class="container">
        <a href="index.php" class="navbar-brand"><?= PROJECT_NAME;?></a>

        <form action="" class="d-flex">
            <div class="input-group">
            <input type="search" name="search" class="form-control" size="60" placeholder="search here">
            <button type="submit" class="btn bg-red text-white"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>

            <?php 
            if(isset($_SESSION['user'])): ?>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <li class="nav-item"><a href="" class="nav-link">Profile</a></li>
            <?php else: ?>

            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="signup.php" class="nav-link">Signup</a></li>

            <?php endif; ?>
        </ul>

    </div>
</nav>