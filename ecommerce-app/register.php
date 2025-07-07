<?php
include 'db.php';

$success = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $success = "Registered successfully!";
    } else {
        $success = "Registration failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - ECOMMERCE-APP</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .register-container {
            max-width: 350px;
            margin: 100px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .register-container input[type="text"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }

        .register-container button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .register-container button:hover {
            background: #218838;
        }

        .register-container .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            color: #155724;
            background: #d4edda;
        }

        .register-container .login-btn {
            background: #6c757d;
            margin-top: 10px;
        }

        .register-container .login-btn:hover {
            background: #495057;
        }

        .register-container .error {
            color: #721c24;
            background: #f8d7da;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>

    <?php if (!empty($success)) {
        $class = strpos($success, 'successfully') !== false ? 'message' : 'message error';
        echo "<div class='$class'>{$success}</div>";
    } ?>

    <form method="POST">
        <input name="username" required placeholder="Username" type="text">
        <input name="password" type="password" required placeholder="Password">
        <button type="submit">Register</button>
    </form>
        <p>Already have an Account?</p>
    <form action="login.php" method="get">
        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

</body>
</html>
