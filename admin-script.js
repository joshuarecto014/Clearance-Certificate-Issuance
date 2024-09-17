let sidebarOpen = false;

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const content = document.querySelector('.content');

    if (sidebarOpen) {
        sidebar.style.width = "60px";
        sidebar.classList.remove('open');
        content.style.marginLeft = "60px"; /* Maintain margin when sidebar is collapsed */
    } else {
        sidebar.style.width = "250px";
        sidebar.classList.add('open');
        content.style.marginLeft = "250px"; /* Adjust margin when sidebar is expanded */
    }
    
    sidebarOpen = !sidebarOpen;
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    
    // Toggle the sidebar open class
    sidebar.classList.toggle("open");
}

// date and time


function updateDateTime() {
    const now = new Date();

    // Format date as "September 14, 2024"
    const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString(undefined, dateOptions);
    document.getElementById('date').textContent = formattedDate;

    // Format time as "14:30:00"
    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
    const formattedTime = now.toLocaleTimeString(undefined, timeOptions);
    document.getElementById('time').textContent = formattedTime;
}

// Update date and time every second
setInterval(updateDateTime, 1000);

// Initial call to set the date and time immediately on page load
updateDateTime();
