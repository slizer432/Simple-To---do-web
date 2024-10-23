<?php

include("../config.php");

$query = $conn->prepare("DELETE FROM Task WHERE ID = :id");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $query->execute(['id' => $id]);
    unset($_POST);
    header("Location: ../dashboard.php");
    exit();
}

