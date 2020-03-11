<?php
require_once('DBconnection.php');

session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Evenementen</title>
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">Accounts</a></li>
                <li><a href="evenementen.php">Evenementen</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="logout.php">Uitloggen</a></li>
            </ul>
        </nav>
    </header>

    <footer>
        <p>&copy; 2019</p>
    </footer>
</div>
</body>
</html>