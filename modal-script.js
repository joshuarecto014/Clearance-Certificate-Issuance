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

      // Re-apply event listeners after content is loaded
      applyViewButtonListeners();
    } else if (this.readyState == 4 && this.status != 200) {
      console.error('Failed to load content from ' + page + '.html');
    }
  };

  xhttp.open("GET", page + ".html", true);
  xhttp.send();
}

function applyViewButtonListeners() {
  const viewButtons = document.querySelectorAll('.action-btn');

  viewButtons.forEach(button => {
    button.addEventListener('click', function () {
      loadModal(); // Load and show the modal when a "View" button is clicked
    });
  });
}

function loadModal() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "modal.html", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      // Insert modal HTML into the page
      document.getElementById("modalContainer").innerHTML = xhr.responseText;

      // Now bind the modal controls
      setupModal();
    }
  };
  xhr.send();
}

function setupModal() {
  const modal = document.getElementById("manageDetailsModal");
  const closeModalBtn = document.getElementById("closeModalBtn");
  const approveBtn = document.getElementById("approveBtn");
  const disapproveBtn = document.getElementById("disapproveBtn");

  // Display the modal
  modal.style.display = "block";

  // Close modal when clicking the close button
  closeModalBtn.onclick = function () {
    modal.style.display = "none";
  };

  // Approve and Disapprove button handlers
  approveBtn.onclick = function () {
    alert("Document Approved!");
    modal.style.display = "none";
  };

  disapproveBtn.onclick = function () {
    alert("Document Disapproved!");
    modal.style.display = "none";
  };

  // Close modal when clicking outside the modal content
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}