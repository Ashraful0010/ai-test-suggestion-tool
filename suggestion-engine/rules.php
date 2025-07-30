<?php
return [
    [
        'condition' => function ($actions) {
            $loginClicks = array_filter($actions, fn($a) => $a['action'] === 'Clicked Login on test_login.php');
            return count($loginClicks) >= 1;
        },
        'message' => "Try testing edge cases like invalid credentials."
    ],
    [
        'condition' => function ($actions) {
            return count($actions) > 5;
        },
        'message' => "You’ve interacted a lot — consider testing session timeout or form reset."
    ],
    [
        'condition' => function ($actions) {
            foreach ($actions as $a) {
                if (strpos($a['page'], 'test_signup') !== false)
                    return true;
            }
            return false;
        },
        'message' => "Since you tested signup, now test login with the new account."
    ]
];
