<?php
$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'] ?? 'guest';
$logFile = "../logs/{$username}_log.txt";
$logData = "[" . date("Y-m-d H:i:s") . "] " . $data['page'] . " => " . $data['action'] . "\n";
file_put_contents($logFile, $logData, FILE_APPEND);

// Also store actions for rule engine
$actionJson = '../logs/user_actions.json';
$allData = file_exists($actionJson) ? json_decode(file_get_contents($actionJson), true) : [];
$allData[$username][] = $data;
file_put_contents($actionJson, json_encode($allData, JSON_PRETTY_PRINT));
