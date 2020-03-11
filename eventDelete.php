<?php
require_once('DBconnection.php');
require_once('eventDelete.php');

if (isset($_POST['deleteItem'])) {
    $id = $_POST['deleteItem'];

    $sql = "DELETE FROM evenementen WHERE id = ? ";
    $query = $conn->prepare($sql);
    $result = $query->execute(array($id));

    header("location: evenementen.php");
}
