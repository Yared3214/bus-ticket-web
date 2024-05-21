<?php
session_start();
include "./../DatabaseConnection/db_conn.php";

if (
    isset($_POST['uname']) &&
    isset($_POST['password']) &&
    isset($_POST['fname']) &&
    isset($_POST['cpassword']) &&
    isset($_POST['email']) &&
    isset($_POST['signup_button'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $email = validate($_POST['email']);
    $cpass = validate($_POST['cpassword']);
    $fname = validate($_POST['fname']);
    $minimumLength = 8;
    $uppercaseRequired = true;
    $lowercaseRequired = true;
    $digitRequired = true;
    $specialCharacterRequired = true;
    if (empty($uname)) {
        header("Location: register.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: register.php?error=Password is required");
        exit();
    } else if (empty($cpass)) {
        header("Location: register.php?error=You need to confirm your password.");
        exit();
    } else if (empty($email)) {
        header("Location: register.php?error=Email is required");
        exit();
    } else if (empty($fname)) {
        header("Location: register.php?error=Name is required");
        exit();
    } else if (strlen($pass) < $minimumLength) {
        header("Location: register.php?error=Password must be at least $minimumLength characters long.");
        exit();
    }
    // Check for uppercase letter
    else if ($uppercaseRequired && !preg_match('/[A-Z]/', $pass)) {
        header("Location: register.php?error=Password must include at least one uppercase letter.");
        exit();
    }
    // Check for lowercase letter
    else if ($lowercaseRequired && !preg_match('/[a-z]/', $pass)) {
        header("Location: register.php?error=Password must include at least one lowercase letter.");
        exit();
    }
    // Check for digit
    if ($digitRequired && !preg_match('/\d/', $pass)) {
        header("Location: register.php?error=Password must include at least one digit.");
    } else {
        if ($pass == $cpass) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result2 = mysqli_query($conn, $query);

            if (mysqli_num_rows($result2) > 0) {
                // Email already exists, display an error message or perform necessary actions
                header("Location: register.php?error=Email address already registered");
                exit();
            } else {
                $sql = "INSERT INTO users (fullName, email, userName, password_) VALUES ('$fname', '$email', '$uname', '$pass')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: ../Login/login.php");
                } else {
                    echo 'Something went wrong';
                }
            }
        } else {
            header("Location: register.php?error=Password does not match");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}