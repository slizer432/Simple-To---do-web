<?php

session_start();

require 'config.php';
require 'process/isLogIn.php';

$query = $conn->prepare("SELECT * FROM Task");
$query->execute();
$task = $query->fetchAll(PDO::FETCH_ASSOC);
$rowCount = count($task);
?>

<html>

<head>
    <title>Task Management</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/button.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <img src="res/Report Card.png" id="logo">
            <h2>To-do List</h2>
            <a href="process/logout.php" id="logout"><img src="res/Emergency Exit.png" alt=""></a>
        </nav>
        <div>
            <h1>Hello, what would you like to do today?</h1>
            <div class="card">
                <div class="tools">
                    <div class="editAll">
                        <form action="process/deleteAll.php" method="POST">
                            <input type="image" src="res/Delete All.png" value="Delete all task" id="deleteAll">
                        </form>
                        <a href="createPage.php"><img src="res/Add.png" id="create"></a>
                    </div>
                    <div class="tabs">
                        <button class="tablink" id="pendingTab"><span>Pending</span></button>
                        <button class="tablink" id="completedTab"><span>Completed</span></button>
                    </div>
                </div>
                <div class="Tasks">
                    <div id="pendingTasks">
                        <?php if ($rowCount == 0) { ?>
                            <div class="empty">
                                <h2>You Don't have any task</h2>
                                <img src="res/Nothing Found.png">
                            </div>
                        <?php } else {
                            foreach ($task as $key => $value) {
                                if ($value['Status'] == 'Pending') { ?>
                                    <div class="task" id="Pending">
                                        <div class="desc">
                                            <form action="process/statusCheck.php" method="POST" class="changeStatus">
                                                <input type="hidden" name="id" value="<?php echo $value['ID']; ?>">
                                                <input type="checkbox" class="checkStatus">
                                            </form>
                                            <p><?php echo $value["Task_Name"]; ?></p>
                                        </div>
                                        <p>Created date: <?php echo date('d M Y', strtotime($value["Created_Date"])); ?></p>
                                        <div class="edit">
                                            <a
                                                href="editPage.php?id=<?php echo $value['ID']; ?>&task_name=<?php echo $value['Task_Name'] ?>"><img
                                                    src="res/Pen.png" alt="edit"></a>
                                            <form action="process/delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $value['ID']; ?>">
                                                <input type="image" src="res/Trash.png" id="delete">
                                            </form>
                                        </div>
                                    </div>
                                <?php }
                            }
                        } ?>
                    </div>
                    <div id="completedTasks" class="hidden">
                        <?php if ($rowCount == 0) { ?>
                            <div class="empty">
                                <h2>You Don't have any task</h2>
                                <img src="res/Nothing Found.png">
                            </div>
                        <?php }
                        foreach ($task as $key => $value) {
                            if ($value['Status'] == 'Complete') { ?>
                                <div class="task" id="completed">
                                    <div class="desc">
                                        <form action="process/statusUncheck.php" method="POST" class="changeStatus">
                                            <input type="hidden" name="id" value="<?php echo $value['ID']; ?>">
                                            <input type="checkbox" class="checkStatus" checked>
                                        </form>
                                        <p style="text-decoration-line :line-through"><?php echo $value["Task_Name"]; ?></p>
                                    </div>
                                    <p>Created date: <?php echo date('d M Y', strtotime($value["Created_Date"]));
                                    ?></p>
                                    <div class="edit">
                                        <a
                                            href="editPage.php?id=<?php echo $value['ID']; ?>&task_name=<?php echo $value['Task_Name'] ?>"><img
                                                src="res/Pen.png" alt="edit"></a>
                                        <form action="process/delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $value['ID']; ?>">
                                            <input type="image" src="res/Trash.png" id="delete">
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>