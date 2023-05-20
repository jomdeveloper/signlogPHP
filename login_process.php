<?php

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $pwd   = $_POST['password'];

    // Database connection
    $mysqli = require_once 'db_connect.php';

    // Initialize a new statement object.
    $stmt = mysqli_stmt_init($mysqli);

    if (!$stmt) {
        die('Statement initialization failed: ' . mysqli_error($mysqli));
    }

    // Query for selecting data from users table.
    $query = 'SELECT id, name, password FROM users WHERE email = ?';

    // Prepare SQL statement for executation with placeholder.
    // It will also check if the praperation was failed.
    if (! mysqli_stmt_prepare($stmt, $query)) {
        die('Preparation failed: ' . mysqli_error($mysqli));
    }

    // After preparing the statment
    // this function will use to bind values to the placeholder. 
    mysqli_stmt_bind_param($stmt, 's', $email);

    if (! mysqli_stmt_execute($stmt)) {
        die('Execution failed: ' . mysqli_error($mysqli));
    }

    // $results contains the result set from the prepared statement.
    $result = mysqli_stmt_get_result($stmt);

    // Use to fetch single row of data from the $result.
    $row = mysqli_fetch_assoc($result);

    // If $row not equal to null
    // this means the inputed email is found in the table users.
    if ($row !== NULL) {

        // password_verify is php built-in function
        // this will match the input password $pwd
        // to hashed password $row['passsword'] from the database.
        if (password_verify($pwd, $row['password'])) {

            //Start the session for the loggged in user.
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];

            mysqli_stmt_close($stmt);
            mysqli_close($mysqli);

            header('Location: index.php');
            exit();
        } else {
            $err_pwd = 'Invalid password. Please try again.';
        }
    } else {
        // No email was found from the table users that matches the input.
        $err_email = 'Invalid email. Please try again.'; 
    }

    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
}