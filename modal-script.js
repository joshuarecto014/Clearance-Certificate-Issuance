


// Function to apply view button event listeners
function applyViewButtonListeners() {
  const viewButtons = document.querySelectorAll('.action-btn');

  viewButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Get the closest table row to retrieve the relevant data
      const row = this.closest('tr');
      const lastName = row.getAttribute('data-lastname');
      const firstName = row.getAttribute('data-firstname');
      const middleName = row.getAttribute('data-middlename');
      const contactNum = row.getAttribute('data-contactnum');
      const purpose = row.getAttribute('data-purpose');

      // Get modal elements
      const lastNameField = document.getElementById('lastName');
      const firstNameField = document.getElementById('firstName');
      const middleNameField = document.getElementById('middleName');
      const contactNumberField = document.getElementById('contactNumber');
      const purposeField = document.getElementById('purpose');

      // Check if the modal elements exist before setting values
      if (lastNameField && firstNameField && middleNameField && contactNumberField && purposeField) {
        // Set the modal values
        lastNameField.value = lastName;
        firstNameField.value = firstName;
        middleNameField.value = middleName;
        contactNumberField.value = contactNum;
        purposeField.value = purpose;

        // Show the modal
        const modal = document.getElementById('manageDetailsModal');
        if (modal) {
          modal.style.display = 'block'; // Show the modal
        }
      } else {
        console.error('Modal elements not found in the DOM');
      }
    });
  });
}

// Function to set up modal close behavior
function setupModal() {
  const modal = document.getElementById('manageDetailsModal');
  const closeModalBtn = document.getElementById('closeModalBtn');

  // Check if modal and close button exist before binding events
  if (modal && closeModalBtn) {
    // Close modal when clicking the close button
    closeModalBtn.onclick = function () {
      console.log('Close button clicked'); // Debug log
      modal.style.display = 'none';
    };

    // Close modal when clicking outside the modal content
    window.onclick = function (event) {
      if (event.target === modal) {
        console.log('Modal background clicked'); // Debug log
        modal.style.display = 'none';
      }
    };
  } else {
    console.error('Modal elements are not found in the DOM.');
  }
}

// Call setupModal() after dynamic content loading
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
      setupModal(); // Ensure modal is set up after loading new content
    } else if (this.readyState == 4 && this.status != 200) {
      console.error('Failed to load content from ' + page + '.php');
    }
  };

  xhttp.open("GET", page + ".php", true);
  xhttp.send();
}


// Function to apply approve button event listeners
function applyApproveButtonListeners() {
  const approveButtons = document.querySelectorAll('.btn-approve');

  approveButtons.forEach(button => {
      button.addEventListener('click', function () {
          // Get the closest table row to retrieve the relevant data
          const row = this.closest('tr');
          const id = row.getAttribute('data-id');

          // Confirm approval
          if (confirm('Are you sure you want to approve this request?')) {
              // Send the ID to the PHP script via AJAX
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      try {
                          // Parse the JSON response
                          var response = JSON.parse(this.responseText);
                          if (response.success) {
                              alert('Request approved successfully!');
                              row.remove(); // Remove the approved row from the table
                          } else {
                              alert('Error: ' + response.message);
                          }
                      } catch (e) {
                          // Catch any errors in JSON parsing
                          console.error('Invalid JSON response:', this.responseText);
                          alert('An error occurred, please check the console for more details.');
                      }
                  }
              };
              xhttp.open("POST", "approve_request.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("id=" + id);
          }
      });
  });
}

// Re-apply event listeners after content is loaded
function applyViewButtonListeners() {
  const viewButtons = document.querySelectorAll('.action-btn');

  viewButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Get the closest table row to retrieve the relevant data
      const row = this.closest('tr');
      const lastName = row.getAttribute('data-lastname');
      const firstName = row.getAttribute('data-firstname');
      const middleName = row.getAttribute('data-middlename');
      const contactNum = row.getAttribute('data-contactnum');
      const purpose = row.getAttribute('data-purpose');

      // Get modal elements
      const lastNameField = document.getElementById('lastName');
      const firstNameField = document.getElementById('firstName');
      const middleNameField = document.getElementById('middleName');
      const contactNumberField = document.getElementById('contactNumber');
      const purposeField = document.getElementById('purpose');

      // Check if the modal elements exist before setting values
      if (lastNameField && firstNameField && middleNameField && contactNumberField && purposeField) {
        // Set the modal values
        lastNameField.value = lastName;
        firstNameField.value = firstName;
        middleNameField.value = middleName;
        contactNumberField.value = contactNum;
        purposeField.value = purpose;

        // Show the modal
        const modal = document.getElementById('manageDetailsModal');
        if (modal) {
          modal.style.display = 'block'; // Show the modal
        }
      } else {
        console.error('Modal elements not found in the DOM');
      }
    });
  });
  applyApproveButtonListeners(); // Ensure approve buttons are set up as well
}