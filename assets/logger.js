document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("input, button").forEach(el => {
        el.addEventListener("click", () => {
            logEvent("click", window.location.pathname, el.name || el.id);
        });

        el.addEventListener("input", () => {
            logEvent("input", window.location.pathname, el.name || el.id);
        });
    });
});

function logEvent(eventType, page, detail) {
    fetch("../action-tracker/log_event.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            eventType: eventType,
            page: page,
            detail: detail,
            timestamp: new Date().toISOString()
        })
    }).catch(err => console.error("Log error:", err));
}
