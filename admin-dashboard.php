<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="admin-dashboard-style.css" />
    <link rel="stylesheet" href="admin-sidebar-style.css" />
    <link rel="stylesheet" href="admin-navbar-style.css" />
    <link rel="stylesheet" href="upload_template.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body>
    <nav class="navbar">
      <div class="logo">Logo</div>
      <ul class="nav-links">
        <li>
          <a href="#"><i class="fa-solid fa-inbox"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-solid fa-user"></i></a>
        </li>
      </ul>
    </nav>

    <div id="sidebar" class="sidebar">
      <a href="javascript:void(0)" class="toggle-btn" onclick="toggleSidebar()">
        <span class="toggle-text">Collapse menu</span>
        <i id="toggle-icon" class="fas fa-arrow-right"></i
      ></a>
      <div class="sidebar-links">
        <a href="javascript:void(0)" onclick="showDashboard()"
          ><i class="fas fa-columns"></i
          ><span class="link-text">Dashboard</span></a
        >
        <!-- Dropdown button -->
        <a
          href="javascript:void(0)"
          class="dropdown-btn"
          onclick="toggleDropdown('doc-issuance-dropdown')"
        >
          <i class="fas fa-file-alt"></i
          ><span class="link-text">Document Issuance</span>
          <i class="fas fa-caret-down dropdown-icon"></i
        ></a>
        <!-- Dropdown container of Document issuance -->
        <ul id="doc-issuance-dropdown" class="dropdown-container">
          <li>
            <a
              href="javascript:void(0)"
              onclick="loadContent('application-management-content')"
              >Application Management</a
            >
          </li>
          <li>
            <a
              href="javascript:void(0)"
              onclick="loadContent('renewal-management-content')"
              >Renewal Management</a
            >
          </li>
        </ul>
        <!-- Dropdown button -->
        <a
          href="javascript:void(0)"
          onclick="loadContent('certificate-management-content')"
        >
          <i class="fas fa-list-check"></i>
          <span class="link-text">Certificate Management</span>
        </a>
        <!-- Dropdown container of certificate management issuance -->

        <a href="#"
          ><i class="fas fa-solid fa-chart-line"></i
          ><span class="link-text">Status and report</span></a
        >
      </div>
      <hr />
      <a class="help" href="#"
        ><i class="fa fa-question-circle"></i
        ><span class="link-text">Help</span></a
      >
      <a class="logout" href="index.html"
        ><i class="fas fa-sign-out"></i><span class="link-text">Logout</span></a
      >
    </div>

    <div class="content">
      <div id="overview-dashboard" class="content">
        <div class="heading-body">
          <hr />
          <div class="datetime-container">
            <div id="date" class="date"></div>
            <div id="time" class="time"></div>
          </div>
          <h2>Overview Dashboard</h2>
          <hr />
        </div>
      </div>

      





      <div id="dashboard-content" class="dashboard-body">

          <form action="upload_template.php" method="POST" enctype="multipart/form-data" id="uploadForm">
                <!-- Hidden file input -->
                <input type="file" name="file" id="file" accept=".doc,.docx" style="display:none;" required>
                
                <!-- Custom button to trigger file input -->
                <button type="button" id="uploadButton" class="btn-upload">+ ADD</button>
                
                <!-- Hidden submit button -->
                <button type="submit" id="submitBtn" style="display:none;"></button>
            </form>

        <div class="quick-links">
          <h4>Quick View Today :</h4>
          <ul>
            <li>
              <a href="#">Today Requests</a><br />
              <p>50</p>
            </li>
            <li>
              <a href="#">Pending Request</a><br />
              <p>50</p>
            </li>
            <li>
              <a href="#">Request Overall</a><br />
              <p>100</p>
            </li>
          </ul>
        </div>
        <div class="chart-row" id="chart">
          <div class="chart-container">
            <h1>REQUEST</h1>
            <canvas id="pieChart"></canvas>
          </div>

          <div class="chart-container">
            <h1>REQUEST</h1>
            <canvas id="barChart"></canvas>
          </div>
        </div>
      </div>

      <div class="content">
        <div id="dynamic-content"></div>
        <!-- Dynamic content will load here -->
      </div>
    </div>


    <div id="modalContainer"></div>
  


    <script src="upload_template.js"></script>
    <script src="admin-script.js"></script>
    <script src="admin-sidebar-script.js"></script>
    <script src="Ajax.js"></script>
    <script src="modal-script.js"></script>
  </body>
</html>
