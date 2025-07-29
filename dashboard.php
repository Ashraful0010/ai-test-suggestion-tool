<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard - AI Test Suggestion Tool</title>
    <!-- Add some style to match your inspiration -->
    <style>
        body {
            margin: 0;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Header styling */
        .header {
            background-color: #1a237e;
            /* Deep blue, like in your description */
            color: #fff;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 3px solid #3949ab;
        }

        .header h1 {
            margin: 0;
            font-size: 2.2em;
            letter-spacing: 1px;
        }

        .header p {
            margin-top: 10px;
            font-size: 1.2em;
            font-weight: normal;
        }

        /* Main content container */
        .content {
            padding: 40px 20px;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .content h2 {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 30px;
        }

        /* Styled buttons with hover animations */
        .buttons a {
            display: inline-block;
            padding: 14px 28px;
            margin: 15px;
            border-radius: 8px;
            font-size: 1.1em;
            font-style: italic;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Different colors for each button for a vibrant look */
        .btn-login {
            background-color: #9b59b6;
            /* Purple */
            color: #fff;
        }

        .btn-login:hover {
            background-color: #8e44ad;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .btn-signup {
            background-color: #27ae60;
            /* Green */
            color: #fff;
        }

        .btn-signup:hover {
            background-color: #229954;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .btn-form {
            background-color: #e67e22;
            /* Orange */
            color: #fff;
        }

        .btn-form:hover {
            background-color: #d35400;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        /* Logout link style */
        .logout {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 1em;
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s ease;
        }

        .logout:hover {
            color: #c0392b;
            text-decoration: underline;
        }

        /* Container for the entire layout */
        .container {
            position: relative;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>AI Test Suggestion Tool</h1>
            <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
        </div>

        <a href="logout.php" class="logout">Logout</a>

        <div class="content">
            <h2>Choose a Test Scenario</h2>
            <div class="buttons">
                <a href="test-pages/test_login.php" class="btn-login">Test Login Page</a>
                <a href="test-pages/test_signup.php" class="btn-signup">Test Signup Page</a>
                <a href="test-pages/test_formfill.php" class="btn-form">Test Form Fillup</a>
            </div>
        </div>
    </div>

</body>

</html>