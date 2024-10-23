<?php

include("../config.php");

$query = $conn->prepare("INSERT INTO Task (Task_Name) VALUES (:Task_Name)");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Task_Name = $_POST['Task_Name'];
    $query->execute(['Task_Name' => $Task_Name]);
    unset($_POST);
    header('Location: ../dashboard.php');
    exit();
}
