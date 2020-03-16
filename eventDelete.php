<?php
require_once('DBconnection.php');

if (isset($_POST['deleteItem'])) {
    $id = $_POST['deleteItem'];

    $sql = "DELETE FROM evenementen WHERE id = ? ";
    $query = $conn->prepare($sql);
    $result = $query->execute(array($id));

    header("location: evenementenAdmin.php");
}
