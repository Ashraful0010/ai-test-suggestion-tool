// /assets/js/suggestion_display.js
document.addEventListener("DOMContentLoaded", function () {
  const box = document.getElementById("suggestionBox");

  function fetchSuggestions() {
    fetch("../suggestion-engine/suggestions.php")
      .then(response => response.json())
      .then(data => {
        if (box && data.suggestions && data.suggestions.length > 0) {
          box.innerHTML = "<strong>Suggestions:</strong><ul>" +
            data.suggestions.map(s => `<li>${s}</li>`).join('') +
            "</ul>";
        }
      });
  }

  setInterval(fetchSuggestions, 4000); // Every 4s
});
