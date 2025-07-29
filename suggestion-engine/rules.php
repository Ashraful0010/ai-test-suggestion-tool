<?php
// /suggestion-engine/rules.php

function generate_suggestions($actions)
{
    $suggestions = [];
    $inputFields = [];

    foreach ($actions as $action) {
        if ($action['type'] === 'input') {
            $inputFields[$action['field']] = true;
        }

        if ($action['type'] === 'submit') {
            if (!isset($action['data']['username']) || !isset($action['data']['password'])) {
                $suggestions[] = "Ensure both username and password fields are filled.";
            } else {
                if (strlen($action['data']['password']) < 6) {
                    $suggestions[] = "Test with a stronger password (at least 6 characters).";
                }
            }
        }
    }

    if (!isset($inputFields['username'])) {
        $suggestions[] = "Test input validation for empty username.";
    }

    return array_unique($suggestions);
}
