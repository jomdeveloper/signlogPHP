<?php
    session_start();

    if (! isset($_SESSION['id'])) {
        header('Location: login.php');
        exit();
    }
?>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title">Welcome</h2>
            <h1 class="card-title"><?=$_SESSION['name']?></h1>
            <h3 class="card-title"><a href="logout.php">LOGOUT</a></h3>
        </div>
    </div>
</body>
</html>