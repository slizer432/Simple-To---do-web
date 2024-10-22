<?php

require 'config.php';

try {
    $query = $conn->prepare("SELECT * FROM Task");

} catch (mysqli_sql_exception $e) {
    die("" . $e->getMessage());
}
?>

<html>

<head>
    <title>Task Management</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="container">
        <nav>
            <img src="res/Report Card.png" id="logo">
            <a href="index.php" id="logout"><img src="res/Emergency Exit.png" alt=""></a>
        </nav>
        <div>
            <h1>A simple Task Manager</h1>
            <div class="card">
                <?php
                $query = $conn->prepare("SELECT * FROM Task");
                $query->execute();
                $row = $query->fetchall(PDO::FETCH_ASSOC);
                $rowCount = count($row);
                if ($rowCount == 0) { ?>
                    <div class="empty">
                        <h2>You Dont have any task</h2>
                        <img src="res/Nothing Found.png">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>