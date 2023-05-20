<?php

if (isset($_POST['name']) 
    && isset($_POST['email']) 
    && isset($_POST['password']) 
    && isset($_POST['password_confirm'])) {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $pwd     = $_POST['password'];
    $pwd_cnf = $_POST['password_confirm'];

    // Lets assume that the validtion is false.
    $isValid = false;

    if (empty($name)) {
        $err_name = 'Name is required.';
    } elseif (! preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $err_name = 'Invalid name. Please try again.';
    } elseif (empty($email)) {
        $err_email = 'Email is required.';
    } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_email = 'Invalid email. Please try again.';
    } elseif (empty($pwd)) {
        $err_pwd = 'Password is required.';
    } elseif (! preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $pwd)) {
        $err_pwd = 'The password must contain at least one uppercase letter,
                    one lowercase letter, one digit and be a minimum of 8 characters long.';
    } elseif ($pwd_cnf !== $pwd) {
        $err_pwd_cnf = 'Password not match.';
    } else {
        // all input are validate without error. Lets set it to true.
        $isValid = true;
    }

    // If its true then lets connect to database and insert input data.
    if ($isValid) {

        // Database connection.
        $mysqli = require_once 'db_connect.php';

        // Initialize a new statement object.
        $stmt = mysqli_stmt_init($mysqli);

        if (!$stmt) {
            die('Statement initialization failed: ' . mysqli_error($mysqli));
        }

        // Query for iserting data to the database.
        $query = 'INSERT INTO users (name, email, password)
                  VALUES (?, ?, ?)';

        // Prepare SQL statement for executation with placeholder.
        // It will also check if the praperation was failed.
        if (! mysqli_stmt_prepare($stmt, $query)) {
            die('Preparation failed: ' . mysqli_error($mysqli));
        }

        // Before saving to the database, password was hashed using
        // php function password_hash.
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        // After preparing the statment
        // this function will use to bind values to the placeholder. 
        mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hashedPwd);

        // Finally execute the statement.
        // If successfully executed then close all connections that was made
        // before redirecting to signup_success.php.
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($mysqli);
            header('Location: signup_success.php');
            exit();
        } else {
            // If execution is fail due to email address duplication
            // then display the error message.
            if (mysqli_errno($mysqli) === 1062) {
                $err_email = 'Email is already taken.';
            }
        }

        // Another close connection here
        // since whe failed our execution.
        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);
    }
}