function loadContent(page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      if (this.status == 200) {
        console.log("Hiding dashboard and overview");
        document.getElementById("dashboard-content").style.display = "none"; 
        document.getElementById("overview-dashboard").style.display = "none"; 
        document.getElementById("dynamic-content").innerHTML = this.responseText; // Load the content
        document.getElementById("dynamic-content").style.display = "block"; // Show dynamic content
      } else {
        console.error('Failed to load content from ' + page + '.php');
      }
    }
  };

  // Corrected path to load the page
  xhttp.open("GET", "/Capstone/" + page + ".php", true); 
  xhttp.send();
}

function showDashboard() {
  console.log("Showing dashboard");
  
  // Hide dynamic content
  document.getElementById("dynamic-content").style.display = "none";
  document.getElementById("dynamic-content").innerHTML = ""; 

  // Show dashboard content and overview
  document.getElementById("dashboard-content").style.display = "block";
  document.getElementById("overview-dashboard").style.display = "block";

}

// Load default dashboard content on page load
window.onload = function() {
  showDashboard(); // Show the dashboard by default
};