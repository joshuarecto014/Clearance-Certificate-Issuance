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







  // Pie Chart Data
  const pieCtx = document.getElementById('pieChart').getContext('2d');
  const pieChart = new Chart(pieCtx, {
      type: 'pie',
      data: {
          labels: ['REJECTED', 'PENDING', 'APPROVE',],
          datasets: [{
              label: 'Color Distribution',
              data: [12, 19, 3,],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(46, 204, 113, 0.7)',
                  
              ],
              borderColor: [
                  'rgba(255, 255, 255, 1)',
                  'rgba(255, 255, 255, 1)',
                  'rgba(255, 255, 255, 1)',
                
              ],
              borderWidth: 2,
              hoverOffset: 10
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'top'
              }
          },
          animation: {
              animateScale: true,
              animateRotate: true
          }
      }
  });

  // Column (Bar) Chart Data
  const barCtx = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(barCtx, {
      type: 'bar',
      data: {
          labels: ['REJECTED', 'PENDING', 'APPROVE',],
          datasets: [{
              label: 'REQUEST',
              data: [12, 19, 5,],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(46, 204, 113, 0.7)',
                  
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(2, 48, 32, 1)',
                  
              ],
              borderWidth: 2
          }]
      },
      options: {
          responsive: true,
          scales: {
              y: {
                  beginAtZero: true
              }
          },
          plugins: {
              legend: {
                  position: 'top'
              }
          }
      }
  });

  // Add 3D shadow effect to the bars in the bar chart
  barChart.config.data.datasets[0].backgroundColor = barChart.config.data.datasets[0].backgroundColor.map(color => {
      return color.replace(/0.6/, '0.9'); // Make colors slightly more solid for 3D effect
  });



 