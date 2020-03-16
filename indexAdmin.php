<?php
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
    <title>Home</title>
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="indexAdmin.php">Home</a></li>
                <li><a href="">Accounts</a></li>
                <li><a href="evenementenAdmin.php">Evenementen</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="logout.php">Uitloggen</a></li>
            </ul>
        </nav>
    </header>
    <div id="picHolder">
        <img src="img/evenement.jpg" alt="evenement">
    </div>
    <footer>
        <p>&copy; 2019</p>
    </footer>
</div>
</body>
</html>