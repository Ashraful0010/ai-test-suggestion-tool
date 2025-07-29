<?php include('../config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simulated Login Page</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <link rel="stylesheet" href="../assets/style.css">

    <div class="container">
        <h2>Simulated Login Page</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit">Login</button>
        </form>
    </div>

    <script src="../logger.js"></script>
</body>

</html>