<?php
session_start();

// Database credentials
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ai_testing_tool_DB";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }

        .login-box {
            width: 400px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            box-shadow: 0 0 10px gray;
            border-radius: 8px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Tester Login</h2>
        <form method="post" action="login.php">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Username" required>
            <button type="submit">Login</button>

        </form>
        <a class="back-link" href="signup.php">Don't have an account? Register</a>
    </div>
</body>

</html> 