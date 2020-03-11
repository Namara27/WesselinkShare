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
    <form action="eventDelete.php" method="post">
        <div id="overzichtEvenementen">
            <h3>Evenementen</h3>
            <?php
            //Display the data in a table
            $sql = $conn->query("SELECT id, datum, naam, locatie FROM evenementen");

            print "<table class ='evenementenoverzicht'>";
            print "<tr><th>Datum</th><th>Naam</th><th>Locatie</th><th>Verwijder</th></tr>";
            foreach ($sql as $row) {
                print "<tr>";
                print "<td>" . $row['datum'] . "</td>";
                print "<td>" . $row['naam'] . "</td>";
                print "<td>" . $row['locatie'] . "</td>";
                print "<td>" . '<button type="submit" name="deleteItem" value="' . $row['id'] . '" <button style="background-color: red; border: solid lightblue; border-right-width: 20px; border-left-width: 20px; border-top-width: 13px"</button>' . "</td>";
                print "</tr>";
            }
            print "</table>";
            ?>
        </div>
    </form>
    <footer>
        <p>&copy; 2019</p>
    </footer>
</div>
</body>
</html>