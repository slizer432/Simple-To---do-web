<?php

require('config.php');

// Initialize error variables
$error1 = '';
$error2 = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($username == $user['username']) {
        $error1 = 'Username already exist, please pick another username' . '<br><br>';
    } else if ($email == $user['email']) {
        $error2 = 'Email already registered, please pick another email' . '<br><br>';
    } else {
        $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

        header('Location: index.php');
    }

}
?>


<html>

<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="css/log_in.css">
</head>

<body>
    <form action="register.php" method="POST">
        <h1>Register</h1>
        <p id="error"><?php echo $error1; ?></p>
        <p id="error"><?php echo $error2; ?></p>
        <input type="text" id="username" name="username" required placeholder="Username"><br><br>
        <input type="text" id="email" name="email" required placeholder="E-mail"><br><br>
        <input type="password" id="password" name="password" required placeholder="Password"><br><br>
        <input type="submit">
        <p>Already have an account? click <a href="index.php">here</a> to log in</p>
    </form>
</body>

</html>