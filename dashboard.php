<?php

require 'config.php';

try {
    $query = $conn->prepare("SELECT * FROM Task");

} catch (mysqli_sql_exception $e) {
    die("" . $e->getMessage());
}
$query = $conn->prepare("SELECT * FROM Task");
$query->execute();
$task = $query->fetchall(PDO::FETCH_ASSOC);
$rowCount = count($task);
$delete = $conn->prepare("DELETE FROM Task");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delete->execute();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
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
            <h2>To-do List</h2>
            <a href="index.php" id="logout"><img src="res/Emergency Exit.png" alt=""></a>
        </nav>
        <div>
            <h1>Hello, what would you like to do today?</h1>
            <div class="card">
                <form method="POST">
                    <input type="image" src="res/Delete All.png" value="Delete all task" id="deleteAll">
                </form>
                <?php
                if ($rowCount == 0) { ?>
                    <div class="empty">
                        <h2>You Dont have any task</h2>
                        <img src="res/Nothing Found.png">
                    <?php } else {
                    foreach ($task as $key => $value) { ?>
                            <div class="task">
                                <div class="desc">
                                    <input type="checkbox">
                                    <p><?php echo $value["Task_Name"]; ?></p>
                                </div>
                                <p> Created date: <?php echo $value["Created_Date"]; ?></p>
                                <div class="edit">
                                    <img src="res/Pen.png" alt="">
                                    <img src="res/Trash.png" alt="">
                                </div>
                            </div>
                        <?php }
                } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>