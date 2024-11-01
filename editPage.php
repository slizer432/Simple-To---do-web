<?php
session_start();

require 'process/isLogIn.php';
?>

<html>

<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="css/input.css">
</head>

<body>
    <div class="container">
        <nav>
            <a href="dashboard.php">
                <img src="res/back.png" id="back">
            </a>
            <h2>Edit Task</h2>
            <a href="process/logout.php" id="logout"><img src="res/Emergency Exit.png" alt=""></a>
        </nav>
        <div class="card">
            <form action="process/edit.php" method="POST" class="task-form">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="text" name="Task_Name" class="task-input" value="<?php echo $_GET['task_name']; ?>"
                    autocomplete="off" required>
                <input type="submit" class="submit-button" value="Edit Task">
            </form>
        </div>
    </div>
</body>

</html>