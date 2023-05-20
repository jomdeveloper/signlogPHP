<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header('Location: profile.php');
        exit;
    }

    require_once 'signup_process.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="style.css" rel="stylesheet">
    <title>Success Page</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="card-title">Succesfully Registered</h1>
            <h3><a href="login.php">Login now</a></h3>
        </div>
    </div>
</body>
</html>