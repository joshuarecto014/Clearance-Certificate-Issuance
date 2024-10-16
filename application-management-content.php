<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="sub-module-style.css">
    <link rel="stylesheet" href="admin-dashboard-style.css">
    <link rel="stylesheet" href="modal-style.css">

    <title>Application</title>
  </head>
  <body>

   
      <div class="heading-body">
              <h2>Application Management</h2>
      </div>
      <div id="application-management" class="application-body">
         
          <div class="overviews">            
              <div class="column" id="overview">
                  <p>Request Overview</p>
                  <table>
                      <tr>
                          <th>ID</th>
                          <th>Document Name</th>
                          <th>Document Type</th>
                          <th>Code</th>
                          <th>File</th>
                          <th>Date Issued</th>
                          <th>Action</th>
                          
                      </tr>
                      <tbody>
                      <?php include 'fetch_requests.php'; ?> <!-- Include PHP script to fetch data -->
                      </tbody>
                  </table>
              </div>
              
          </div>
      </div>

      <!-- Modal HTML here, so it is part of the main page -->
<div id="manageDetailsModal" class="modal">
  <div class="modal-content">
          <div class="modal-header">
            <span class="modal-title">Manage Details</span>
            <button class="btn-close" id="closeModalBtn">&times;</button>
          </div>
      <div class="modal-body">
            <form id="manageDetailsForm">

            
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" class="form-control" disabled />

              <label for="firstName">First Name</label>
              <input type="text" id="firstName" class="form-control" disabled />

              <label for="middleName">Middle Name</label>
              <input type="text" id="middleName" class="form-control" disabled />

              <label for="contactNumber">Contact Number</label>
              <input type="text" id="contactNumber" class="form-control" disabled />

              <label for="purpose">Purpose</label>
              <input type="text" id="purpose" class="form-control" disabled />
           </form>
       </div>
  </div>
</div>
      
      <script src="modal-script.js"></script> 


  </body>
</html>
