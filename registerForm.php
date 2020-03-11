<?php
include_once('DBconnection.php');
session_start();

if (isset($_POST["registreren"])) {
    $username = $_POST['regUsername'];
    $email = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    $repeatpassword = $_POST['regRepeatPassword'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    //Check if email format is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a valid email";
    }

    //Check if username exists
    $query = "SELECT username FROM accounts WHERE username =?";

    $res = $conn->prepare($query);
    $res->execute([$username]);

    if ($res->rowCount() > 0) {
        $error = "Username already exists";
    }

    //Check if email exists
    $query = "SELECT email FROM accounts WHERE email =?";

    $res = $conn->prepare($query);
    $res->execute([$email]);

    if ($res->rowCount() > 0) {
        $error = "Email already exists";
    }

    //Check if passwords match
    if ($password !== $repeatpassword) {
        $error = "The password doesn't match";
    }

    //Creates a new account
    if (!isset($error)) {
        $sql = "INSERT INTO accounts (username, password, email) VALUES (?,?,?)";

        $result = $conn->prepare($sql);
        $result->execute([$username, $hash, $email]);

        echo "<script>alert('Account successfully created!'); window.location='login.html';</script>";
    } else {
        echo "<script>alert('$error '); window.location='registreren.html';</script>";
    }
}