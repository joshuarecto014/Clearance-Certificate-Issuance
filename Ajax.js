function loadContent(page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      if (this.status == 200) {
        console.log("Hiding dashboard and overview");
        document.getElementById("dashboard-content").style.display = "none"; 
        document.getElementById("overview-dashboard").style.display = "none"; 
        
        // This should hide the chart row since it's part of dashboard-content
        var chartRow = document.getElementById("chart");
        if (chartRow) {
          chartRow.style.display = "none"; 
          console.log("Chart row hidden");
        }

        document.getElementById("dynamic-content").innerHTML = this.responseText;
        document.getElementById("dynamic-content").style.display = "block"; 
        console.log("Dynamic content loaded and displayed");
      } else {
        console.error('Failed to load content from ' + page + '.php');
      }
    }
  };

  xhttp.open("GET","Capstone/" + page + ".php", true); 
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

  // Show the chart row
  var chartRow = document.getElementById("chart");
  if (chartRow) {
    chartRow.style.display = "flex"; 
    console.log("Chart row shown");
  }
}

// Load default dashboard content on page load
window.onload = function() {
  showDashboard(); // Show the dashboard by default
};