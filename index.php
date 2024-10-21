<?php

session_start();

require 'config.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && $password == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password!" . '<br><br>';
    }
}
?>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="log_in_styles.css">
</head>

<body>
    <form action="index.php" method="POST">
        <h1>Login</h1>
        <p id="error"><?php echo $error; ?></p>
        <input type="text" id="username" name="username" required placeholder="Username"><br><br>
        <input type="password" id="password" name="password" required placeholder="Password"><br><br>
        <input type="submit" value="log in">
        <p>Don't have an account? Register <a href="register.php">here</a></p>
    </form>
</body>

</html>