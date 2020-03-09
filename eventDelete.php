<?php
require_once('DBconnection.php');


$sql =  "DELETE datum, naam, locatie FROM evenementen WHERE id = ? ";
$query = $conn->prepare($sql);
$result = $query->execute(array($id));
