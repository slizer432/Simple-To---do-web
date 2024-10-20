<?php

require('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

    header('Location: index.php');
}
?>


<html>

<head>
    <title>Register Form</title>
</head>

<body>
    <h1>Register</h1>
    <form action="register.php" method="POST">
        <label for="username">Username: </label><br>
        <input type="text" name="username" required><br>
        <label for="email">E-mail: </label><br>
        <input type="text" name="email" required><br>
        <label for="password">Password: </label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit">
        <p>Already have an account? click <a href="index.php">here</a> to log in</p>
    </form>
</body>

</html>