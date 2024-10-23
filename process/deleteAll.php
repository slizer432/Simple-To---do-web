<?php

require("../config.php");

$delete = $conn->prepare("DELETE FROM Task");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delete->execute();
    header("Location: ../dashboard.php");
    exit();
}

?>