<?php
    require_once 'login_process.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="style.css" rel="stylesheet" defer>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form class="card" method="POST">
            <h1 class="card-title">Login</h1>
            <div class="input-container">
                <input type="text"
                       id="email"
                       name="email"
                       value="<?=$email ?? ''?>"
                       onkeyup="clearInputError(this)"
                       autocomplete="off">
                <label for="email">EMAIL</label>
                <i class='bx bx-envelope'></i>
                <span><?=$err_email ?? ''?></span>
            </div>
            <div class="input-container">
                <input type="password"
                       id="password"
                       name="password">
                <label for="password">PASSWORD</label>
                <i class='bx bx-lock-alt'></i>
                <i class='bx bx-show' id='toggle_password'></i>
                <span><?=$err_pwd ?? ''?></span>
            </div>
            <button>LOGIN</button>
            <h5>Don't have an account? <a href="signup.php">Signup</a></h5>
        </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>