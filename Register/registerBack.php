<?php
session_start();
include "db_conn.php";

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
    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else if (empty($cpass)) {
        header("Location: index.php?error=You need to confirm your password.");
        exit();
    } else if (empty($email)) {
        header("Location: index.php?error=Email is required");
        exit();
    } else if (empty($fname)) {
        header("Location: index.php?error=Name is required");
        exit();
    } else {
        if ($pass == $cpass) {
            $sql = "INSERT INTO users (fullName, email, userName, password_) VALUES ('$fname', '$email', '$uname', '$pass')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: login.php");
            } else {
                echo 'Something went wrong';
            }

            // $p = $conn->prepare("INSERT INTO users (fullName, email, userName, password_) VALUES ('$fname', '$email', '$uname', '$pass')");
            // $p->bind_param(':f', $fname);
            // $p->bind_param(':e', $email);
            // $p->bind_param(':n', $uname);
            // $p->bind_param(':p', $pass);
            // $p->execute();
            // echo 'Registered successfully!!';
        } else {
            header("Location: index.php?error=Password does not match");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}