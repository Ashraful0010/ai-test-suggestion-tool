<?php
session_start();
$username = $_SESSION['username'] ?? 'guest';
$rules = include('rules.php');
$actionData = json_decode(file_get_contents("../logs/user_actions.json"), true);
$actions = $actionData[$username] ?? [];

$suggestions = [];

foreach ($rules as $rule) {
    if (call_user_func($rule['condition'], $actions)) {
        $suggestions[] = $rule['message'];
    }
}

header('Content-Type: application/json');
echo json_encode($suggestions);
