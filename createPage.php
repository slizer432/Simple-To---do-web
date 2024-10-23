<?php
session_start();

require 'process/isLogIn.php';
?>

<html>

<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="css/input.css">
</head>

<body>
    <div class="container">
        <nav>
            <a href="dashboard.php">
                <img src="res/back.png" id="back">
            </a>
            <h2>Create Task</h2>
            <a href="logout.php" id="logout"><img src="res/Emergency Exit.png" alt=""></a>
        </nav>
        <div class="card">
            <form action="process/create.php" method="POST" class="task-form">
                <input type="text" name="Task_Name" class="task-input" placeholder="Enter task name" autocomplete="off"
                    required>
                <input type="submit" class="submit-button" value="Create Task">
            </form>
        </div>
    </div>
</body>

</html>