<?php
// /action-tracker/log_action.php
$data = json_decode(file_get_contents("php://input"), true);
$logFile = "../logs/user_actions.json";

if ($data && is_array($data)) {
    $existing = file_exists($logFile) ? json_decode(file_get_contents($logFile), true) : [];
    $existing[] = $data;
    file_put_contents($logFile, json_encode($existing, JSON_PRETTY_PRINT));
    echo json_encode(["status" => "logged"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>