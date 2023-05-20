<?php
    require_once 'signup_process.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="style.css" rel="stylesheet">
    <title>Signup</title>
</head>
<body>
    <div class="container">
        <form class="card" method="POST">
            <h1 class="card-title">Signup</h1>
            <div class="input-container">
                <input type="text"
                       id="name"
                       name="name" 
                       value="<?=$name ?? ''?>"
                       onkeyup="clearInputError(this)"
                       autocomplete="off">
                <label for="name">NAME</label>
                <i class="bx bx-user"></i>
                <span><?=$err_name ?? ''?></span>
            </div>
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
                       name="password"
                       value="<?=$pwd ?? ''?>">
                <label for="password">PASSWORD</label>
                <i class='bx bx-lock-alt'></i>
                <i class='bx bx-show' id='toggle_password'></i>
                <span><?=$err_pwd ?? ''?></span>
            </div>
            <div class="input-container">
                <input type="password"
                       id="password_confirm"
                       name="password_confirm"
                       value="<?=$pwd_cnf ?? ''?>"
                       onkeyup="clearInputError(this)">
                <label for="password_confirm">CONFIRM PASSWORD</label>
                <i class='bx bx-lock-alt'></i>
                <i class='bx bx-show' id='toggle_password_confirm'></i>    
                <span><?=$err_pwd_cnf ?? ''?></span>
            </div>
            <button>SUBMIT</button>
            <h5>Already have an account? <a href="login.php">Login</a></h5>
        </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>