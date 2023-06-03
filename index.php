<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login Page</title>
</head>

<body>
    <?php
    ?>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="assets/img/sooya.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign In</h1>
            </div>
            <form class="login-card-form" action="cek-login.php" method="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" name="username" placeholder="Enter Username" id="username" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="password" placeholder="Enter Password" id="passwordForm" required>
                </div>
                <div class="form-item-other">
                    <a href="forgot.php">I forgot my password!</a>
                </div>
                <button type="submit" name="login">Sign In</button>
                <div class="guest">
                    <a href="produk-user.php">
                        <span name="guest">Guest</span>
                    </a>
                </div>
            </form>
            <div class="login-card-footer">
                <!-- Don't have an account? <a href="register.php">Create a free account.</a> -->
            </div>
        </div>
    </div>

</body>

</html>