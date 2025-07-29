<?php
// /suggestion-engine/suggestions.php
include('rules.php');

$logFile = "../logs/user_actions.json";
$suggestions = [];

if (file_exists($logFile)) {
    $actions = json_decode(file_get_contents($logFile), true);
    $suggestions = generate_suggestions($actions);
}

header("Content-Type: application/json");
echo json_encode(["suggestions" => $suggestions]);
