<?php
session_start();
$_SESSION['username'] = 'ggwp123'; // Hardcoded for demo purpose
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test Login Page</title>

    <!-- ✅ Internal CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 30px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0px 0px 10px #ccc;
        }

        input,
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        .suggestions {
            margin-top: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid green;
        }
    </style>

    <!-- ✅ JS Files -->
    <script src="../action-tracker/logger.js" defer></script>
    <script src="../suggestion-engine/suggestion_display.js" defer></script>
</head>

<body>
    <div class="container">
        <h2>Simulated Login</h2>
        <input type="text" placeholder="Username" id="username">
        <input type="password" placeholder="Password" id="password">
        <button id="loginBtn">Login</button>

        <div id="suggestion-box" class="suggestions"></div>
    </div>

    <script>
        document.getElementById("loginBtn").addEventListener("click", function () {
            alert("Login attempt simulated");

            // Trigger action log
            logAction("Clicked Login on test_login.php");

            // Trigger rule engine
            fetch("../suggestion-engine/suggestions.php")
                .then(res => res.json())
                .then(data => {
                    const box = document.getElementById("suggestion-box");
                    box.innerHTML = data.length > 0
                        ? "<strong>Suggestions:</strong><ul>" + data.map(d => `<li>${d}</li>`).join("") + "</ul>"
                        : "No suggestions generated.";
                });
        });
    </script>
</body>

</html>