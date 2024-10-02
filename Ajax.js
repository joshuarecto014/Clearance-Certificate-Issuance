function loadContent(page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Hide the dashboard content and overview
      document.getElementById("dashboard-content").style.display = "none";
      document.getElementById("overview-dashboard").style.display = "none";

      // Load the new content into dynamic-content and show it
      document.getElementById("dynamic-content").innerHTML = this.responseText;
      document.getElementById("dynamic-content").style.display = "block"; // Make dynamic content visible
    } else if (this.readyState == 4 && this.status != 200) {
      console.error('Failed to load content from ' + page + '.html');
    }
  };

  xhttp.open("GET", page + ".html", true);
  xhttp.send();
}

function showDashboard() {
  // Hide any loaded dynamic content
  document.getElementById("dynamic-content").style.display = "none";
  document.getElementById("dynamic-content").innerHTML = "";  // Clear the dynamic content

  // Show the dashboard content and overview
  document.getElementById("dashboard-content").style.display = "block";
  document.getElementById("overview-dashboard").style.display = "block";
}

// Load default dashboard content on page load
window.onload = function() {
  showDashboard();  // Show the dashboard by default
};
