function logAction(action) {
    const username = "<?php echo $_SESSION['username'] ?? 'guest'; ?>";

    fetch("../action-tracker/log_event.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ username, action, page: "test_login.php", timestamp: new Date().toISOString() })
    });
}
