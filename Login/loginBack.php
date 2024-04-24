<?php
session_start();
include "./../DatabaseConnection/db_conn.php";

if (isset($_POST['password']) && isset($_POST['email'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $pass = validate($_POST['password']);
    $email = validate($_POST['email']);
    if (empty($email)) {
        header("Location: login.php?error=Email is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' AND password_='$pass'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password_'] === $pass) {
                $_SESSION['name'] = $row['userName'];
                $_SESSION['fullName'] = $row['fullName'];
                $_SESSION['id'] = $row['id'];
                header("Location: /bus_ticket_system/home.php");
                exit();
            } else {
                header("Location: login.php?error=Incorect Email or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorect Email or password");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}