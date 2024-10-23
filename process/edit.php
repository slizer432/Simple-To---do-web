<?php

include("../config.php");

$query = $conn->prepare("UPDATE Task SET Task_Name = :Task_Name WHERE ID = :id;");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $Task_Name = $_POST['Task_Name'];
    $query->execute(['id' => $id, 'Task_Name' => $Task_Name]);
    unset($_POST);
    header('Location: ../dashboard.php');
    exit();
}
