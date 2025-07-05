<?php
include 'db.php';
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='error'>Incorrect password.</div>";
        }
    } else {
        echo "<div class='error'>User not found.</div>";
    }
}
?>
<html>
<head>
    <title>ECOMMERCE-APP</title>
</head>
<style>
    

body { 
    background: #f7f7f7; 
    font-family: Arial, sans-serif; 
}
.login-container { 
    max-width: 350px; 
    margin: 60px auto; 
    background: #fff; 
    padding: 30px 25px 20px 25px; 
    border-radius: 8px; 
    box-shadow: 0 2px 8px rgba(0,0,0,0.08); 
}
.login-container h2 { 
    text-align: center; 
    margin-bottom: 20px; 
    color: #333; 
}
.login-container input[type="text"],
.login-container input[type="password"] { 
    width: 100%; 
    padding: 10px; 
    margin: 8px 0 16px 0; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    font-size: 15px; }
.login-container button { 
    width: 100%; 
    padding: 10px; 
    background: #007bff; 
    color: #fff; border: none; 
    border-radius: 4px; 
    font-size: 16px; 
    cursor: pointer; 
    transition: background 0.2s; 
}
.login-container button:hover { 
    background: #0056b3; 
}
.login-container .register-btn { 
    background: #6c757d; 
    margin-top: 10px; 
}
.login-container .register-btn:hover { 
    background: #495057; 
}
.login-container .error { 
    color: #d8000c; 
    background: #ffd2d2; 
    padding: 8px; 
    border-radius: 4px; 
    margin-bottom: 10px; 
    text-align: center; 
}
</style>
<body>
<form method="POST">
    <input name="username" type="text" required placeholder="Username">
    <input name="password" type="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>

<form action="register.php" method="get">
    <button type="submit" class="register-btn">Register</button>
</form>
</body>
</head>
</html>
