// Sidebar toggle function
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const dropdownIcons = document.querySelectorAll('.dropdown-icon');
  sidebar.classList.toggle("open");

  // Toggle visibility of dropdown icons based on sidebar state
  if (sidebar.classList.contains("open")) {
    dropdownIcons.forEach(icon => icon.style.display = 'inline'); // Show icons when sidebar is open
  } else {
    dropdownIcons.forEach(icon => icon.style.display = 'none'); // Hide icons when sidebar is collapsed

    // Close any open dropdowns when sidebar is collapsed
    const openDropdowns = document.querySelectorAll('.dropdown-container.show');
    openDropdowns.forEach(dropdown => dropdown.classList.remove('show'));
  }
}

// Dropdown toggle function
function toggleDropdown(dropdownId) {
  const sidebar = document.getElementById("sidebar");
  
  // Only allow dropdown toggle if the sidebar is expanded
  if (sidebar.classList.contains("open")) {
    const dropdown = document.getElementById(dropdownId);
    const dropdownIcon = dropdown.previousElementSibling.querySelector('.dropdown-icon');

    // Toggle the display of the dropdown
    dropdown.classList.toggle("show");

    // Toggle the dropdown icon
    if (dropdown.classList.contains("show")) {
      dropdownIcon.classList.remove("fa-caret-down");
      dropdownIcon.classList.add("fa-caret-up");
    } else {
      dropdownIcon.classList.remove("fa-caret-up");
      dropdownIcon.classList.add("fa-caret-down");
    }
  }
}





// Sidebar toggle function
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const dropdownIcons = document.querySelectorAll('.dropdown-icon');
  sidebar.classList.toggle("open");

  // Toggle visibility of dropdown icons based on sidebar state
  if (sidebar.classList.contains("open")) {
    dropdownIcons.forEach(icon => icon.style.display = 'inline'); // Show icons when sidebar is open
  } else {
    dropdownIcons.forEach(icon => icon.style.display = 'none'); // Hide icons when sidebar is collapsed

    // Close any open dropdowns when sidebar is collapsed
    const openDropdowns = document.querySelectorAll('.dropdown-container.show');
    openDropdowns.forEach(dropdown => dropdown.classList.remove('show'));
  }
}

// Dropdown toggle function
function toggleDropdown(dropdownId) {
  const sidebar = document.getElementById("sidebar");
  
  // Only allow dropdown toggle if the sidebar is expanded
  if (sidebar.classList.contains("open")) {
    const dropdown = document.getElementById(dropdownId);
    const dropdownIcon = dropdown.previousElementSibling.querySelector('.dropdown-icon');

    // Toggle the display of the dropdown
    dropdown.classList.toggle("show");

    // Toggle the dropdown icon
    if (dropdown.classList.contains("show")) {
      dropdownIcon.classList.remove("fa-caret-down");
      dropdownIcon.classList.add("fa-caret-up");
    } else {
      dropdownIcon.classList.remove("fa-caret-up");
      dropdownIcon.classList.add("fa-caret-down");
    }
  }
}



