function showSection(sectionId) {
    // Hide all sections
    document.getElementById('dashboard-content').style.display = 'none';
    document.getElementById('application-management-content').style.display = 'none';
    
    // Hide the Overview Dashboard section when switching to other sections
    document.getElementById('overview-dashboard').style.display = 'none';
    
    // Show the selected section
    document.getElementById(sectionId).style.display = 'block';
  
    // If returning to the Dashboard, show the Overview Dashboard section again
    if (sectionId === 'dashboard-content') {
      document.getElementById('overview-dashboard').style.display = 'block';
    }
  }
  
  // Function to show Dashboard, including the Overview Dashboard
  function showDashboard() {
    showSection('dashboard-content');
  }

 